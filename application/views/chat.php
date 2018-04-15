<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FYP</title>

    <style>
        body {
        font-family: Roboto, sans-serif;
        font-size: 16px;
        background-color: #FDFDFD;
        }

        div, input, a, button, textarea, ul, li {
        box-sizing: border-box;
        }

        .container {
        max-width: 100%;
        width: 760px;
        margin: 0 auto;
        }

        #reviews {
        list-style-type: none;
        margin: 0;
        padding: 0;
        border-bottom: 1px solid #EEE;
        border-radius: 2px;
        box-shadow: 0 1px 6px rgba(0,0,0,.1),0 1px 4px rgba(0,0,0,.1);
        background-color: #fff;
        min-height: 20px;
        margin-bottom: 20px;
        }

        #reviews li {
        padding: 10px;
        border: 1px solid #EEE;
        border-bottom: none;
        border-radius: 2px;
        background-color: #fff;
        }

        input[type="text"],
        textarea {
        border: 1px solid #EEE;
        display: block;
        width: 100%;
        padding: 8px;
        font-size: 16px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 1px 6px rgba(0,0,0,.1),0 1px 4px rgba(0,0,0,.1);
        }

        textarea {
        min-height: 100px;
        }

        .header {
        text-align: center;
        padding-top: 50px;
        }

        .header h1,
        .header h4 {
        font-weight: normal;
        margin: 10px 0;
        }

        .header img {
        border-radius: 50%;
        box-shadow: 0 1px 1px rgba(0,0,0,.1),0 1px 1px rgba(0,0,0,.1);
        }
    </style>

</head>

<body>
<script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>
<div class='container'>
    <div class='header'>
      <h1>Chat Here:</h1>
      <h4>ErBAS Customer Service</h4>
    </div>
    <h2>Reviews</h2>

    <br/>
    <h4>READ/DELETE</h4>
    <ul id='reviews'></ul>
    <form id='reviewForm'>
      <input type="hidden" id='emailAdmin' value="<?php echo $emailAdmin; ?>" />
      <input type="hidden" id='emailx' value="<?php echo $email; ?>" />
      <input type="hidden" id='namex' value="<?php echo $namex; ?>" />
      <h5><?php echo $email; ?></h5>
      <br/>
      <textarea id='message'></textarea>
      <br/>
      <button type='submit'>Reply</button>
    </form>
</div>

<script type="text/javascript">
    var dt = new Date();
    var dateMonth =  dt.getMonth() + 1;
    var config = {
        apiKey: "AIzaSyCsT8dtpnQGF9ud-t69HWoued8aEjss338",
        authDomain: "test2-5698d.firebaseapp.com",
        databaseURL: "https://test2-5698d.firebaseio.com",
        projectId: "test2-5698d",
        storageBucket: "test2-5698d.appspot.com",
        messagingSenderId: "948114249723"
        };
    firebase.initializeApp(config);
    var db = firebase.database();

    // CREATE REWIEW

    var reviewForm = document.getElementById('reviewForm');
    var emailx   = document.getElementById('emailx').value;
    var name   = document.getElementById('namex').value;
    var name2 = name;
    name = name.replace(/\s/g,''); 
    var message    = document.getElementById('message');
    var emailAdmin   = document.getElementById('emailAdmin');

    reviewForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // if (!emailx.value || !message.value) return null

        db.ref('chats/'+name+'/'+dateMonth+'/'+name2).set({
            name: name2,
            message: message.value
        });
        message.value  = '';

    });

    // READ REVEIWS

    var reviews = document.getElementById('reviews');
    var reviewsRef = db.ref('chats/'+name+'/'+dateMonth);

    reviewsRef.once('child_added', (snapshot) => {
        var test = snapshot.val();
        console.log(test.name);
        var li = document.createElement('li')
        li.id = snapshot.key;
        // li.innerHTML = reviewTemplate(data.val())
        reviews.appendChild(li);
    });


    // function reviewTemplate({name, message}) {
    //     return `
    //     <div class='fullName'>${name}</div>
    //     <div class='message'>${message}</div>
    //     `
    // };

    
</script>

