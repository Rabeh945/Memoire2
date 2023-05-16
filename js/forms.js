const overlay = $('.signup-overlay');
const signUpForm = $('.sign-up-container')[0];
// function rotate() {
//     const refresh = document.getElementById('ref_btn')
//     refresh.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
// }



const button = document.getElementById('back-to-top');
button.addEventListener('click', scrollToTop);
// ---- 
// Signup btn show and hide ... 
$(document).ready(function () {

    var showBtn = $('.signup_link');


    overlay.click(function () {
        overlay.hide();
        signUpForm.style.display = 'none';
    });

    showBtn.click(function () {
        overlay.show();
        signUpForm.style.display = 'flex';
    });
    var signupSubmitBtn = $('signup-form-submit');
});
// -----
// Signup form 
// contact form ---

/* 
function contactUsFormHandle(event) {
    
    event.preventDefault();
    const email = $('#email-contact-form')[0].value;
    const message = $('#message')[0].value;

    if (!email || !message) {
        alert('Please fill in all fields');
        return;
    }

    const formData = {
        email,
        message
    };
    console.log(formData)
    contactUsForm.reset();
    setTimeout(function () {
        $('.overlay').hide();
    }, 1500);
}
// ----
$('#register-form').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serializeArray();
    var jsonData = {};
    if (formData[3].value != formData[2].value) {
        return;
    } else {
        $.each(formData, function (index, element) {
            jsonData[element.name] = element.value;
        });
        var jsonString = JSON.stringify(jsonData);
        console.log(jsonString);
        $(this).hide();
        $('.sign-up-container').hide();
        $('.signup-overlay').hide();
        $('.overlay').show();
        setTimeout(function () {
            $('.overlay').hide();
        }, 2000);

    }

    // $.ajax({
    //   type: 'POST',
    //   url: '',
    //   data: jsonString,
    //   success: function(response) {
    //     console.log(response);
    //   },
    //   error: function(jqXHR, textStatus, errorThrown) {
    //     console.error(textStatus, errorThrown);
    //   }
    // });
});
$('#login-form').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serializeArray();
    var jsonData = {};
    $.each(formData, function (index, element) {
        jsonData[element.name] = element.value;
    });
    var jsonString = JSON.stringify(jsonData);
    console.log(jsonString);
    $(this).hide();
    $('.sign-up-container').hide();
    $('.signup-overlay').hide();
    $('.overlay').show();
    setTimeout(function () {
        $('.overlay').hide();
    }, 2000);
}

    // $.ajax({
    //   type: 'POST',
    //   url: '',
    //   data: jsonString,
    //   success: function(response) {
    //     console.log(response);
    //   },
    //   error: function(jqXHR, textStatus, errorThrown) {
    //     console.error(textStatus, errorThrown);
    //   }
    // });
); */
$('#form-signup-link').click(function () {
    $('#register-form').show();
    $('#form-signup').hide()
    $('.signup-title>h2').html('Sign Up');
    $('#form-signin').show();
    $('#login-form').hide();
})
$('#form-signin-link').click(function () {
    $('#form-signin').hide();
    $('#login-form').show();
    $('.signup-title>h2').html('Sign In');
    $('#register-form').hide();
    $('#form-signup').show();
})
$('.signup_link').click(function () {
    $('#register-form').show();
    $('#form-signup').hide()
    $('.signup-title>h2').html('Sign Up');
    $('#form-signin').show();
    $('#login-form').hide();
})

$('.signin_link').click(function () {
    overlay.show();
    signUpForm.style.display = 'flex';
    $('#form-signin').hide();
    $('#login-form').show();
    $('.signup-title>h2').html('Sign In');
    $('#register-form').hide();
    $('#form-signup').show();
});

$(document).ready(function() {
    // Show/hide dropdown menu when button is clicked
    $("#user-profile").click(function() {
      $(".profile-link-drop").toggle();
    });
  
    // Hide dropdown menu when user clicks outside of it
    $(document).click(function(e) {
      var container = $("#user-profile, .profile-link-drop");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        $(".profile-link-drop").hide();
       
      }
    });
  });


const profilePictureInput = $('.change-img');
const profilePictureButton = $('.picture-btn');
profilePictureButton.click(function(){
profilePictureInput.click();
});

$(document).ready(function(){
    $(".edit-name").click(function(){
        $('.dname').toggle();
    });
        
    $('.edit-email').click(function(){
        $('.demail').toggle();
    })
    $(document).click(function(e){
        if (!$('.demail, .edit-email').is(e.target) && $('.demail, .edit-email').has(e.target).length === 0){
            $('.demail').hide();
        }
        if (!$('.dname, .edit-name').is(e.target) && $('.dname, .edit-name').has(e.target).length === 0){
            $('.dname').hide();
        }
    })
})
