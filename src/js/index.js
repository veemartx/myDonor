const checkLoggedIn = () => {

    $.post('server/checkLogin.php', (data) => {

        // console.log(data);

        let loggedIn = JSON.parse(data);


        if (loggedIn.loggedIn != true) {

            // get the auth stack
            $('.wrapper').load('stacks/auth.stack.html');

        } else {

            // get the home stack
            $('.wrapper').load('stacks/home.stack.html');


        }
    });

}


// f.calls
checkLoggedIn();
