
(function(win,doc){
    'use strict';

    //Delete
    function confirmDel(event)
    {
        event.preventDefault();
       
        // let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar o seu perfil? Essa ação é irreversível!")){
            let target =location.href; 
            console.log(target);  
            let uriDelete = target + '/delete';
            console.log(uriDelete);
           
            document.formdel.submit();
            // }

        }else{
            return false;
        }
    }
    if(doc.querySelector('.js-del')){
        let btn=doc.querySelector('.js-del');
        
            btn.addEventListener('click',confirmDel,false);
        
    }
})(window,document);