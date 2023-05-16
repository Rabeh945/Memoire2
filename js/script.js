window.addEventListener('load', () => {
    document.querySelector('.overlay').style.display = 'none';
});

document.querySelector('.overlay').style.display = 'block';
setTimeout(() => {
    document.querySelector('.overlay').style.display = 'none';
}, 1000);


if ((window.location.pathname == '/Memoire/explore.php') || (window.location.pathname == '/Memoire/profile.php')) {
    document.addEventListener("DOMContentLoaded", function () {
        var profileDropMenu = document.querySelector('.profile-link-drop');
        var profileMenuBtn = document.querySelector('#user-profile');
        profileMenuBtn.addEventListener('click', function () {
            profileDropMenu.classList.toggle('block');
        })

        var container = document.querySelector("#user-profile, .profile-link-drop");
        document.addEventListener("click", function (e) {
            if (!container.contains(e.target) && !profileMenuBtn.contains(e.target) && profileDropMenu.classList.contains('block')) {
                profileDropMenu.classList.toggle('block');
            }
        });
    });
}
if ((window.location.pathname == '/Memoire/index.php')) {
    document.addEventListener("DOMContentLoaded", function () {
        var profileDropMenu = document.querySelector('.profile-link-drop');
        var profileMenuBtn = document.querySelector('.profile-link-avatar-img');
        profileMenuBtn.addEventListener('click', function () {
            profileDropMenu.classList.toggle('block');
        })

        var container = document.querySelector(".profile-link-avatar-img, .profile-link-drop");
        document.addEventListener("click", function (e) {
            if (!container.contains(e.target) && !profileMenuBtn.contains(e.target) && profileDropMenu.classList.contains('block')) {
                profileDropMenu.classList.toggle('block');
            }
        });
    });
}

// back to top button ---
window.addEventListener('scroll', toggleBackToTop);
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
function toggleBackToTop() {
    const button = document.getElementById('scroll-back');
    button.addEventListener('click', scrollToTop);
    if (window.scrollY > 400) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
}
if (window.location.pathname == '/Memoire/login.php') {
    document.getElementById('signup-link').addEventListener('click', () => {
        document.location.pathname = '/Memoire/register.php';
    });
    document.querySelector('.home-btn').addEventListener('click', () => {
        document.location.pathname = '/Memoire/index.php';
    })


}

if (window.location.pathname == '/Memoire/register.php') {
    document.getElementById('signin-link').addEventListener('click', () => {
        document.location.pathname = '/Memoire/login.php';
    });
    document.querySelector('.home-btn').addEventListener('click', () => {
        document.location.pathname = '/Memoire/index.php';
    })
}


window.onload = function () {
    if (window.location.pathname == '/Memoire/profile.php') {
        editDisplayName = document.querySelector('.edit-name');
        displayNameInput = document.querySelector('.dname');
        displayName = document.getElementById('display_name');
        editDisplayName.addEventListener('click', () => {
            displayNameInput.classList.toggle('inline-block');  
            displayName.classList.toggle('none');
        });
        editEmail = document.querySelector('.edit-email');
        emailInput = document.querySelector('.demail');
        emailAdress = document.getElementById('email_address');
        editEmail.addEventListener('click', () => {
            emailInput.classList.toggle('inline-block');
            emailAdress.classList.toggle('none');
            
        })
    }
};
if (window.location.pathname == '/Memoire/explore.php'){
    
    document.querySelector('.banner-selction').addEventListener('click',function(event){
        selectedBanner = document.querySelector('.banner__selected')
        let target = event.target;
        console.log(target.id)
        let banner = document.querySelector('.banner-section');
        if (!target.classList.contains('banner__selected')){
            if (target.id == 'banner1'){
                selectedBanner.classList.toggle('banner__selected')
                target.classList.toggle('banner__selected')
                banner.style.backgroundColor = "#247b86"; // banner.style.backgroundImage = "url('')";
                console.log(target)
            }
            if (target.id == 'banner2'){
                selectedBanner.classList.toggle('banner__selected')
                target.classList.toggle('banner__selected')
                banner.style.backgroundColor = "black";

                console.log(target)
            }
            if (target.id == 'banner3'){
                selectedBanner.classList.toggle('banner__selected')
                target.classList.toggle('banner__selected')
                banner.style.backgroundColor = "#4f684f"; 

                console.log(target)
            }
            if (target.id == 'banner4'){
                selectedBanner.classList.toggle('banner__selected')
                target.classList.toggle('banner__selected')
                banner.style.backgroundColor = "lightblue";
                console.log(target)
            }
        }


    });
}


