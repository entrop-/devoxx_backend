/**
 * Created by entrop on 06/09/16.
 */

var DEVOX = (function () {

    return {
        nextStep : function () {
            var linkElements = document.getElementsByTagName("a");
            for (var i=0;i<linkElements.length;i++){

                linkElements[i].addEventListener("click", function(e){
                    e.preventDefault();

                    var parentSection = DEVOX.findAncestor(e.target,'SECTION');
                    parentSection.className += " hidden";
                    parentSection.nextElementSibling.classList.remove("hidden");

                });
            }

        },
        getUnusedPictures : function () {
            //todo:ajax call to db
        },
        submitForm : function() {

        },
        findAncestor : function  (el, tag) {
            while ((el = el.parentElement) && el.tagName != tag);
            return el;
        }

    };
}());
