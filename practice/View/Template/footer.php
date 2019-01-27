<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/View/JS/SendMessage.js"></script>
</head>
<body>
<footer id="main-footer" class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="py-4">

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="email" placeholder="Email"
                                               aria-label="email" aria-describedby="basic-addon1"
                                               value="<?= $_SESSION['Email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <p class="text-danger ml-2 text-left" id="email_error"></p>
                                </div>
                            </div>
                            <textarea class="form-control" id="text_message" rows="4"
                                      placeholder="Отправить письмо администратору!" required></textarea>
                            <div class="row">
                                <div class="col-5">
                                    <p class="text-danger ml-2 text-left" id="text_message_error"></p>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-auto">
                                    <a onclick="AjaxSendMessage('email', 'text_message', 'email_error', 'text_message_error')"
                                       class='btn btn-warning mt-2 text-white'><img class="mr-2"
                                                                                    src='/View/Image/Send_Email.png'>Send Mail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>