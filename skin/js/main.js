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

                    //fill inputs
                    var colorInput = document.getElementById('input_color');
                    var urlInput = document.getElementById('input_url');

                    if (parentSection.classList.contains('set-beacon')) {
                        colorInput.value = this.className;
                    }

                    if (parentSection.classList.contains('set-image')) {
                        urlInput.value = this.href;
                    }

                    //change view
                    parentSection.className += " hidden";
                    parentSection.nextElementSibling.classList.remove("hidden");
                    parentSection.nextElementSibling.classList.add(this.className);

                });
            }

        },
        findAncestor : function  (el, tag) {
            while ((el = el.parentElement) && el.tagName != tag);
            return el;
        }

    };
}());
