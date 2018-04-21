// if (document.getElementById('gmail-current')) {

    console.log('it works!');
    var mail =document.getElementById('gmail-login'), verified;
    var gmailCurrent = document.getElementById("gmail-current");

    function registerGoogle(){
        //preventDefault();
    // firebase.auth().onAuthStateChanged(LoginIsCruel);
        // document.getElementById("imgDB").style.display = "none";
        var provider = new firebase.auth.GoogleAuthProvider();
        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Google Access Token. You can use it to access the Google API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            mail.parentNode.removeChild(mail);
            app(user);
            
        
            // ...
        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
        });
    }


    function app(user){
        //user.displayname user.email user.photoURL user.uid //user.phoneNumber
        var param = {
            name: user.displayName,
            email: user.email,
            photoURL: user.photoURL

        }
        ajax( param);


        function ajax( param ){
            var path = 'http://dev.fypiqa.com/index.php/ajax/gmailsave';
            return $.ajax({
                type: "POST",
                data: {
                    param:param
                },
                url: path,
                success: function(data){
                    console.log(data);
                location.reload(true);
                }
            });
        }

    }


// }







