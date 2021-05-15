<?php include "header.php" ?>

<main>
    <!-- <div class="container">
        <div class="row" style="margin: 2rem; padding: 2rem;">
            <div class="col" style="background-color: grey;">
                <p>USERS LIST</p>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="text-decoration-none" href="message.php?asd">
                            <div class="d-grid gap-2"><button type="button" class="btn btn-primary">Ahmet</button></div>
                        </a>
                    <li>
                    <li class="list-group-item">
                        <a class="text-decoration-none" href="message.php?asd">
                            <div class="d-grid gap-2"><button type="button" class="btn btn-primary">Ahmet</button></div>
                        </a>
                    <li>
                    <li class="list-group-item">
                        <a class="text-decoration-none" href="message.php?asd">
                            <div class="d-grid gap-2"><button type="button" class="btn btn-primary">Ahmet</button></div>
                        </a>
                    <li>
                </ul>


            </div>
            <div class="col" style="background-color: brown;">
                <p>MESSAGE LIST</p>
                <div>
                    <p class="text-end">i send message</p>
                    <p class="text-start">you send message to me</p>
                    <p class="text-end">i send message</p>
                    <p class="text-start">you send message to me</p>
                    <p class="text-end">i send message</p>
                    <p class="text-start">you send message to me</p>
                    <p class="text-end">i send message</p>
                    <p class="text-start">you send message to me</p>

                </div>
                <div>
                    <textarea name="" id="" cols="80" rows="5">

                    </textarea>
                    <button class="btn btn-primary">send</button>
                </div>


            </div>
        </div>
    </div> -->
    <div style=" margin: 5rem;">
        <div class="row">
            <div class="d-grid gap-2 col-4">
                <div class="list-group d-grid gap-2" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Home</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                </div>
            </div>
            <div class="d-grid gap-2 col-4" style="border: 1px solid;">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <p class="text-end">i send message</p>
                        <p class="text-start">you send message to me</p>
                        <p class="text-end">i send message</p>
                        <p class="text-start">you send message to me</p>
                        <p class="text-end">i send message</p>
                        <p class="text-start">you send message to me</p>
                        <div>
                            <textarea name="" id="" cols="60" rows="2">adasdasdasd</textarea>
                            <button class="btn btn-primary">send</button>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">..fghfghfgh.</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">..jlşljkşklş.</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">..4645648.</div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php" ?>