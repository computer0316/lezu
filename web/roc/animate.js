
        function getTop(Id){
            var obj = document.getElementById(Id);
            return obj.getBoundingClientRect().top;
        }

        function getDom(Id){
            var obj=document.getElementById(Id);
            return obj;
        }

		function setAnimation(Id){
            /*第二页动画的触发*/
            if(getTop(Id) < 900){
                getDom(Id).classList.add('animated');
                getDom(Id).classList.add('fadeInUp');
            }
		}


