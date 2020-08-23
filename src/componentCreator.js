var componentCreator = {
    createCard(title, bodyValue){
        let cardEl = `            
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">`+title+`</h5>
                <div class="card-text"> 
                    `+bodyValue+`
                </div>
            </div>
        </div>
        `;
        return cardEl;
    },
    createButton(text, className, callBack){
        let el = `<button class="btn `+className+`" onclick="`+callBack+`">`+text+`</button>`;
        return el;
    }
}
