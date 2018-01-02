<?php

namespace app\controllers;

use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;

use app\models\Article;




class ArticleController extends Controller
{
	public $enableCsrfValidation = false;

	public function actions()
	{
	    return [
	        'upload' => [
	            'class' => 'app\widgets\ueditor\UEditorAction',
	            'config' => [
	                "imageUrlPrefix"  => "/lezu/web",//图片访问路径前缀
	                "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
	                "imageRoot" => Yii::getAlias("@webroot"),
	            ],
	        ]
	    ];
	}

	// 添加客户信息
	public function actionAdd(){
		$this->layout = "admin";
		$article = new Article();
		$post = Yii::$app->request->post();
		// 加载客户信息
		if($article->load($post)){
			$article->userid=1;
			if($article->save()){
				Yii::$app->session->setFlash('message', '文章添加成功');
			}
			else{
				Yii::$app->session->setFlash('message', $article->errorMessage);
			}
		}
		return $this->render('add', ['article' => $article]);
	}

	// 文章列表
	public function actionList(){
		$this->layout = "admin";
		$articles = Article::find()->all();
		return $this->render("list", ['articles' => $articles]);
	}

	// 显示文章
	public function actionShow($id){
		$this->layout = "admin";
		$article = Article::findOne($id);
		return $this->render("show", ['article' => $article]);

	}



	// ***************************************** 这里是原来的方法 *****************************************
	// 修改老客户
	public function actionEditold(){
		$oldClient	= new Oldclient();
		$client		= new Client(['scenario' => 'add']);
		$post		= Yii::$app->request->post();
		if($oldClient->load($post)){
			$oldClient	= Oldclient::findOne(['name' => $oldClient->name]);
			if(!$oldClient){
				Yii::$app->session->setFlash('message', '没有找到这个老客户');
				return $this->render('editold',[
					'client'	=> $client,
					'oldClient'	=> new OldClient,
					]);
			}
			if($client->load($post)){
				$client->id	= $oldClient->id + 1000;
				$client->name	= $oldClient->name;
				$client->newold	= LAO_KE_HU;
				if($client->save()){
					$oldClient->effective = 0;
					$oldClient->save();
					Yii::$app->session->setFlash('message', '老客户修改成功');
				}
				else{
					echo '<meta charset="utf-8">';
					echo '';
					vardumper::dump($client);
					die();
				}
			}
		}
		return $this->render('editold',[
			'client'	=> $client,
			'oldClient'	=> $oldClient,
			]);
	}

	public function actionListOld(){
		$query		= Oldclient::find()
				->where('effective = 1')
				->orderBy('id');

    		$countQuery	= clone $query;
    		$pages		= new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 17]);
    		$clients	= $query->offset($pages->offset)->limit($pages->limit)->all();

		if($clients){
			return $this->render('listold', [
				'clients'	=> $clients,
				'pages'		=> $pages,
				]);
		}
		else{
			return $this->render('listold', [
				'pages'		=> $pages,
				]);
		}
	}


	// 老客户首次付款
	public function actionOldPay(){
		$clientid	= Yii::$app->session->get('search-client-id');
		$apartmentid	= Yii::$app->session->get('select-apartment-id');

		$oldInfo	= Oldclient::findOne($clientid-1000);
		$total		= round($oldInfo->price * $oldInfo->area);
		$apartment	= Apartment::findOne($apartmentid);
		if($apartment->area > $oldInfo->area){
			$total	= $total + round(($apartment->area - $oldInfo->area) * $apartment->oldprice);
			$price	= round($total / $apartment->area, 2);
		}
		else{
			$price	= round($total / $oldInfo->area, 2);
		}
		$journal	= new Journal();
		$approvalLoad	= new Approval();
		$sales		= new Sales();
		$client		= Client::findOne($clientid);
		$post		= Yii::$app->request->post();
		if($journal->load($post)){
			try{
				$sales->load($post);
				//$accessory->load($post);
				$approvalLoad->load($post);
				$apartment->note = $approvalLoad->text;
				// 存储销售信息、存储流水信息
				$firstPaySuccess = $journal->firstPay($client, $apartment, $sales->save());
				if($firstPaySuccess){
					//$message = '信息已经存储，请打印认购单或者合同后交费';
					Yii::$app->session->setFlash('message', '信息已经存储，请打印认购单或者合同后交费');
					// 生成一个审批对象，检测是否需要审批
					$approval 		= new Approval($journal->id);
					// 如果需要审批
					if($approval->priceTooLow()){
						$approval->text		= $approvalLoad->text;		// 载入审批意见
						$approval->start(YOU_HUI);				// 发起审批
						$approval->initHighLevel($approval->level - 1);		// 发起上一级审批
						$approval->inform($approval->level - 1);		// 发送短信通知给上一级审批
						//$message = '提交的价格需要审批，请等待审批结束后再打印认购单';
						Yii::$app->session->setFlash('message', '提交的价格需要审批，请等待审批结束后再打印认购单');
					}
					$accessory		= new Accessory();
					$accessory->unionid	= $journal->unionid;
					$accessory->save();
					$apartment->setOrdering();	// 设置房屋属性为交定金中
					Tools::removeSessions();	// 清除设置的相关 session
				}
				else{
					Yii::$app->session->setFlash('message', $journal->errorMessage);
					Tools::removeSessions();
				}
			}
			catch(Exception $e){
				Yii::$app->session->setFlash('message', $e->getMessage());
			}
		}

		return $this->render('oldpay', [
			'price'		=> $price,
			'total'		=> $total,
			'approval'	=> $approvalLoad,
			'journal'	=> $journal,
			'oldInfo'	=> $oldInfo,
			'sales'		=> $sales,
			'apartment'	=> $apartment,
			]);
		// 审批
	}

	// 首次付款
	public function actionFirstPay(){
		$clientid	= Yii::$app->session->get('search-client-id');
		$apartmentid	= Yii::$app->session->get('select-apartment-id');
		// 读取客户信息，如果没有转到客户查找页面
		if(!isset($clientid)){
			//Yii::$app->session->setFlash('message', '请先选择客户');
			$route = [
				'/client/search',
				'search-client-next'	=> '/client/first-pay',
				'search-title'		=> '订金付款 > 查找客户'];
			return $this->redirect(Url::toRoute($route));
		}
		// 读取楼盘信息，如果没有转到楼盘选择页面
		if(!isset($apartmentid)){
			//Yii::$app->session->setFlash('message', '请先选择客户');
			Yii::$app->session->set('select-apartment-next', '/client/first-pay');
			Yii::$app->session->set('select-title', '首付交费 > 选择房源');
			return $this->redirect(Url::toRoute('/apartment/select'));
		}
		$client		= Client::findOne($clientid);
		if($client->newold == 2){
			return $this->redirect(Url::toRoute('old-pay'));
		}
		$post		= Yii::$app->request->post();
		$journal	= new Journal();
		$approvalLoad	= new Approval(0);
		$accessory	= new Accessory();
		$sales		= new Sales();
		$apartment	= Apartment::findOne($apartmentid);
		$orderprint	= false;
		$message	= '';
		if($journal->load($post) && $sales->load($post)){
			try{
				$accessory->load($post);
				$approvalLoad->load($post);
				$apartment->note = $approvalLoad->text;
				// 存储销售信息、存储流水信息
				$firstPaySuccess = $journal->firstPay($client, $apartment, $sales->save());
				if($firstPaySuccess){
					//$message = '信息已经存储，请打印认购单或者合同后交费';
					Yii::$app->session->setFlash('message', '信息已经存储，请打印认购单或者合同后交费');
					// 生成一个审批对象，检测是否需要审批
					$approval 		= new Approval($journal->id);
					// 如果需要审批
					if($approval->priceTooLow()){
						$approval->text		= $approvalLoad->text;		// 载入审批意见
						$approval->start(YOU_HUI);				// 发起审批
						$approval->initHighLevel($approval->level - 1);		// 发起上一级审批
						//$message = '提交的价格需要审批，请等待审批结束后再打印认购单';
						Yii::$app->session->setFlash('message', '提交的价格需要审批，请等待审批结束后再打印认购单');
					}
					$accessory->unionid	= $journal->unionid;
					$accessory->save();		// 保存附属设施信息
					$orderprint	= true;		// 显示打印认购单凭证连接
					$apartment->setOrdering();	// 设置房屋属性为交定金中
					Tools::removeSessions();	// 清除设置的相关 session
				}
				else{
					Yii::$app->session->setFlash('message', $journal->errorMessage);
					Tools::removeSessions();
				}
			}
			catch(Exception $e){
				Yii::$app->session->setFlash('message', $e->getMessage());
			}
		}
		return $this->render('firstpay', [
			'client'	=> $client,
			'approval'	=> $approvalLoad,
			'apartment'	=> $apartment,
			'journal'	=> $journal,
			'sales'		=> $sales,
			'accessory'	=> $accessory,
			'orderprint'	=> $orderprint,
			'message'	=> $message,
		]);
	}

	// 后续付款
	public function actionSecondPay(){
		$journalLoad	= new Journal();
		$post		= Yii::$app->request->post();
		if($journalLoad->load($post)){
			$journalCheck	= Journal::find()
						->where(['effective' => 1, 'unionid' => $journalLoad->unionid])
						->orderBy('updatetime desc')
						->one();
			if($journalCheck->statusid>100){
				Yii::$app->session->setFlash('message', '请检查是否有待确认的交费');
				return $this->render('secondpay', [
					'journal' => $journalLoad,
				]);
			}

			$journal	= Journal::find()
					->where([
						'and',
						"unionid='" . $journalLoad->unionid . "'",
						'effective = 1',
						['in', 'statusid', [YI_JIAO_DING_JIN, YI_JIAO_SHOU_FU, YI_JIAO_YI_QI, YI_JIAO_QUAN_KUAN]],
						])
					->orderBy('updatetime desc')
					->one();

			if(!$journal){
				Yii::$app->session->setFlash('message', '合同编号错误，或没有交订金信息！');
			}
			else{
				//$journal->minFirstPayMoney();
				return $this->render('secondpay', [
					'journal' => $journal,
				]);
			}
		}
		return $this->render('secondpay', [
			'journal' => $journalLoad,
		]);
	}

	// 保存后续付款（订金、全款、直接交的首付）信息
	public function actionSaveSecondPay(){
		$journal = new Journal();
		if($journal->load(Yii::$app->request->post())){
			try{
				$journal->secondPay();
				Yii::$app->session->setFlash('message', '交费信息已提交，请打印单据付款，然后到系统确认交款');
			}
			catch(Exception $e){
				Yii::$app->session->setFlash('message', $e->getMessage());
			}
		}
		return $this->render('secondpay', ['journal' => $journal]);
	}

	// 处理打印事宜
	public function actionPrint(){
		$journal	= new Journal;
		$printWhat	= '';
		if($journal->load(Yii::$app->request->post())){
			// 根据合同号，读取正在审批申请中的流水
			$journal = Journal::find()
					->where(['unionid' => $journal->unionid, 'effective' => 1])
					->orderBy('updatetime desc')
					->one();
			if(!$journal){
				Yii::$app->session->setFlash('message', '没有找到合同号');
					return $this->render('print', [
					'journal'	=> new Journal(),
					'printWhat'	=> $printWhat,
				]);
			}

			$approval = new Approval($journal->id);
			$apartment = Apartment::findOne($journal->apartmentid);
			$client = Client::findOne($journal->clientid);
			// 检查审批状态，只有通过审批的才能打印合同或者认购单
			if($approval->checkStatus() == TONG_YI){
				Yii::$app->session->set('print-journal-id', $journal->id);
				if($client->newold == 2){
					if($journal->exceed50()){
						$printWhat = 'contractnew';
					}
					else{
						$printWhat = 'order-print';
					}
				}
				else{
					if($journal->exceed30()){
						$printWhat = 'contractnew';
					}
					else{
						$printWhat = 'order-print';
					}
				}
			}
			else{
				Yii::$app->session->setFlash('message', '合同信息还没有通过审批');
			}
		}
			return $this->render('print', [
				'journal'	=> $journal,
				'printWhat'	=> $printWhat,
			]);
	}

	// 打印新客户合同
	public function actionContractnew(){
		$journalid	= Yii::$app->session->get('print-journal-id');
		if(isset($journalid) && $journalid>0){
			$journal	= Journal::find()->where(['id' => $journalid])->orderBy('updatetime desc')->one();
			$client		= Client::findOne($journal->clientid);
			$apartment	= Apartment::findOne($journal->apartmentid);
			$sales		= Sales::findOne($journal->salesid);
			$project	= Project::findOne($apartment->projectid);
			$accessory	= Accessory::findOne($journal->unionid);
			//Yii::$app->session->remove('print-journal-id');
			$this->layout	= false;
			return $this->render('contractnew',[
				'journal'	=> $journal,
				'client'	=> $client,
				'apartment'	=> $apartment,
				'sales'		=> $sales,
				'accessory'	=> $accessory,
				'project'	=> $project,
			]);
		}
	}

	// 打印老客户合同
	public function actionContractold(){
		$journalid	= Yii::$app->session->get('print-journal-id');
		if(isset($journalid) && $journalid>0){
			$journal	= Journal::findOne($journalid);
			$client		= Client::findOne($journal->clientid);
			$apartment	= Apartment::findOne($journal->apartmentid);
			$project	= Project::findOne($apartment->projectid);
			$sales		= Sales::findOne($journal->salesid);
			$accessory	= Accessory::findOne($journal->unionid);
			Yii::$app->session->remove('print-journal-id');
			$this->layout	= false;
			return $this->render('contractold',[
				'journal'	=> $journal,
				'client'	=> $client,
				'apartment'	=> $apartment,
				'sales'		=> $sales,
				'accessory'	=> $accessory,
			]);
		}
	}

	// 打印认购单
	public function actionOrderPrint(){
		$journalid 	= Yii::$app->session->get('print-journal-id');
		if(isset($journalid) && $journalid){
			$journal	= Journal::findOne($journalid);
			$client		= Client::findOne($journal->clientid);
			$apartment	= Apartment::findOne($journal->apartmentid);
			$sales		= Sales::findOne($journal->salesid);
			$accessory	= Accessory::findOne($journal->unionid);
			$this->layout	= false;
			return $this->render('orderprint',[
				'journal'	=> $journal,
				'client'	=> $client,
				'apartment'	=> $apartment,
				'sales'		=> $sales,
				'accessory'	=> $accessory,
			]);
		}
		else{
			Yii::$app->session->setFlash('message', '没有找到订单');
			return $this->redirect(Url::toRoute('/site/index'));
		}
	}
	// 查找客户
	public function actionSearch(){
		$roles = [ADMIN, GUAN_LI_YUAN, CAO_ZUO_YUAN];
		if(!Role::check($roles)){
			return $this->redirect(Url::toRoute('//user/login'));
		}
		$post = Yii::$app->request->post();

		$client		= new Client();
		$formfield	= new Formfield();
		$breadcrumb	= Yii::$app->request->get('search-title');
		if(!isset($breadcrumb)){
			$breadcrumb = '查找客户';
		}
		if($formfield->load($post)){
			/*****************  后台第三次执行  ***************/
			// 提交了客户编号的处理
			// 把客户编号保存到 flash session，程序执行转向到选择的页面
			Yii::$app->session->set('search-client-id', $formfield->int);
			$go = Yii::$app->request->get('search-client-next');
			return $this->redirect(Url::toRoute($go));
		}
		elseif(!$client->load($post)){
			/*****************  后台第一次执行  ***************/
			// 提交了客户信息的处理
			return $this->render('search', [
				'client'	=> $client,
				'breadcrumb'	=> $breadcrumb,
				]);
		}
		else{
			/*****************  后台第二次执行  ***************/
			// 提取客户信息
			if($client->name == '' && $client->mobile == '' && $client->idcard == ''){
				Yii::$app->session->setFlash('message', '必须至少输入一项');
				return $this->render('search', [
				'client'	=> $client,
				'breadcrumb'	=> $breadcrumb,
				]);
			}
			$clients = $client->search();

			// 如果没找到客户信息
			if(!$clients){
				// 返回原页面，显示错误信息
				Yii::$app->session->setFlash('message', '客户不存在');
				return $this->render('search', [
					'client' => $client,
					'breadcrumb'	=> $breadcrumb,
					]);
			}
			Yii::$app->session->remove('search-client-id');
			// 显示所有找到的客户信息列表供选择
			return $this->render('search', [
				'clients'	=> $clients,
				'breadcrumb'	=> $breadcrumb,
				]);
		}
	}
	// 交费确认
	public function actionShowConfirm(){
		// 如果编号不正确，提示重新输入编号
		$journalLoad	= new Journal();
		Yii::$app->session->set('order-confirmed', 'false');
		if(!$journalLoad->load(Yii::$app->request->post())){
			$journal	= new Journal();
			// 显示一个读取编号的框
			return $this->render('showconfirm',['journal' => $journal,]);
		}
		else{
			// 读取该流水信息
			$journal = Journal::find()->where(['unionid' => $journalLoad->unionid])->orderBy('updatetime desc')->one();
			if(!$journal){
				Yii::$app->session->setFlash('message', '没有找到该流水号');
				return $this->render('showconfirm',['journal' => $journalLoad,]);
			}
			if(!$journal->needConfirm()){
				Yii::$app->session->setFlash('message', '该订单无需确认');
				return $this->render('showconfirm',['journal' => $journal,]);
			}

			// 读取客户信息、楼盘信息供确认
			$apartment	= Apartment::findOne($journal->apartmentid);
			$client		= Client::findOne($journal->clientid);

			Yii::$app->session->set('order-confirmed-id', $journal->id);
			return $this->render('showconfirm',[
				'journal'	=> $journal,
			]);
		}
	}

	// 确认流水信息
	// 确认流水信息包括两层含义：（1）根据审核结果的不同，确定流水信息。（2）根据流水的内容不同，改变流水的状态
	public function actionConfirm(){
		$journal	= Journal::findOne(Yii::$app->session->get('order-confirmed-id'));
		$approval	= New Approval($journal->id);
		$apartment	= Apartment::findOne($journal->apartmentid);
		$accessory	= Accessory::findOne($journal->unionid);
		$client		= Client::findOne($journal->clientid);

		switch($approval->checkStatus()){
			case BU_TONG_YI:			// 审批没通过
				// 回退流水状态
				$journal->orderConfirm(false);
				// 如果有附属设施信息，则删除
				if($accessory){
					$accessory->delete();
				}
				// 如有需要，回退房源状态
				$apartment->setOnsale();
				Yii::$app->session->setFlash('message', '审核没有通过，如有需要请重新申请');
				break;
			case TONG_YI:			// 审批通过
				// 修改流水状态
				$orderOrBuy = $journal->orderConfirm(true);
				// 修改房源状态
				switch($orderOrBuy){
					case YI_JIAO_DING_JIN:
						$apartment->setOrdered();
						Yii::$app->session->setFlash('message', '成功交订金');
						break;
					case YI_JIAO_SHOU_FU:
					case YI_JIAO_QUAN_KUAN:
					case YI_JIAO_YI_QI:
						$apartment->setPayed();
						Yii::$app->session->setFlash('message', '成功交首付或全款');
						break;
				}
				break;
			case DAI_SHEN:			// 审批进行中
				// 显示提示信息
				Yii::$app->session->setFlash('message', '优惠申请还在审核中，请耐心等待');
				break;
		}
		Yii::$app->session->remove('order-confirmed->id');
		return $this->render('confirm',[
			'journal'	=> $journal,
//			'client'	=> $client,
//			'apartment'	=> $apartment,
		]);
	}
}
