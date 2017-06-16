//when the HTML is loaded, load/run everything in the function
$(document).ready(function () {
    

    var invalidColor = "#c4182c";
    $('form').each(function () {
        this.reset()
    });

    $(".textBox").focus(function () {
        $("label[for='" + $(this).attr("id") + "']").addClass("is-active is-completed");
    });


    $(".textBox").focusout(function () {
        if ($(this).val() === "") {
            $("label[for='" + $(this).attr("id") + "']").removeClass("is-completed");
        }

        $("label[for='" + $(this).attr("id") + "']").removeClass("is-active");
    });
    
    function changeColor(tag, re) {
        //get the contents of the 
        var contents = $(tag).val();
        //if it doesn't pass the regex
        if (re.test(contents) == false) {
            //set the color to the invalid Color
            $(tag).css("color", invalidColor);
        } else {
            //reset the color to white
            $(tag).css("color", "white");
        }
    }
    

    var userNamePass, passwordPass;
    userNamePass = passwordPass = false;

 
    function errorLog(tag, re, locationId, failString) {
        var contents = $(tag).val();
        changeColor(tag, re);

        if (contents === "") {
            $(locationId).empty();
            return false;
        } 
        else if (re.test(contents) === true) {
            $(locationId).empty();
            return true;
        }
        else {
            $(locationId).html(failString);
            return false;
        }
    }
    $("#userName").keyup(function () {
        var errorString = "Username can only contain letters, numbers and special characters . - _";
        userNamePass = errorLog("#userName", /^[A-z0-9-_]*$/, "#userNameError", errorString);
    });
    
    $("#password").keyup(function() {
        if ($("#password").val() !== "") {
            passwordPass = errorLog("#password", /^.+$/, "#passwordError", "");
        }
        else {
            passwordPass = false;
        }
    });
});