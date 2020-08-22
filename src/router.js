function Router(){
    var menus = [
        {componentUrl: "./src/component/LandingDescription.html", name: "Home", path: ""},
        {componentUrl: "./src/component/QuestionForm.html", name: "Question Form", path: "question"},
    ];
    return {
        menus: menus,
        curentPath: "EMPTY",
        get menuList(){
            return this.menus;
        },
        set menuList(arr){
            this.menus = arr;
        },
        isUpdateStart: false,
        setPath(path){
            if(this.curentPath != path){
                let findMenu = this.menuList.find(item=>{
                    return item.path == path;
                });
                if(findMenu!=undefined){
                    if(selectEl('head title')!=null){
                        selectEl('head title').innerHTML = "Hachi Eight | "+findMenu.name;
                        selectEl(".HE-TITLE").innerHTML = findMenu.name;
                        selectEl(".body-page").innerHTML = "<div import-file='"+findMenu.componentUrl+"'></div> ";    
                    }
                }else{
                    selectEl('head title').innerHTML = "Hachi Eight | ERROR";
                    selectEl(".HE-TITLE").innerHTML = "";
                    selectEl(".body-page").innerHTML = "<div import-file='./src/component/ErrorPage.html'></div> "
                }
                selectEl(".body-page").innerHTML += "<div import-file='./src/component/Footer.html'></div> "

                includeHTML();
                this.curentPath = path;
            }
        },
        startUpdate(path){
            if(this.isUpdateStart==false){
                setInterval(() => {
                    this.setPath(path);
                }, 500);
                this.isUpdateStart = true;
            }
        }
    };
}