var oUniitiBadge = {
    _badgeId :'my-badge',
    _containerId : 'my-uniiti-rate',
    _width : '294px',
    _height : '70px',
    iCustomerId : null,
    init: function(iId){
        oUniitiBadge.iCustomerId = iId;
        if(document.getElementById(oUniitiBadge._containerId)){
            oUniitiBadge.showBadge();
        }else{
            alert('Une balise est introuvable ! Merci de copier exactement le code généré par uniiti.fr !');
        }
    },
    showBadge: function(){
        var element = document.createElement("iframe");
        element.setAttribute('id', oUniitiBadge._badgeId);
        element.setAttribute('width', oUniitiBadge._width);
        element.setAttribute('height', oUniitiBadge._height);
        element.setAttribute('frameBorder', '0');
        element.setAttribute('src', 'http://uniiti.fr/includes/mybadge.php?enseigne='+oUniitiBadge.iCustomerId);
        document.getElementById(oUniitiBadge._containerId).appendChild(element);
    }
}


