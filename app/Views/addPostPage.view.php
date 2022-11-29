<div class="container">
    <h1 class="my-5 text-center">Add a post</h1>
    <!-- Create an Article -->
    <div class="card shadow my-5">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Add a Post</h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mb-5">
                <div>
                    <form method="post" action="postProcessing">
                        <!-- Category input-->
                        <div class="my-4">
                            <select class="form-control form-control-lg" name="category" id="category">
                                <option disabled selected>Choose a post category...</option>
                                <option value="1">Symfony</option>
                                <option value="2">React</option>
                                <option value="3">Java</option>
                                <option value="4">JQuery</option>
                                <option value="5">Sass</option>
                                <option value="6">Bootstrap</option>
                            </select>
                            <div class="invalid-feedback">A category is required.</div>
                        </div>
                        <!-- title input-->
                        <div class="my-4">
                            <input class="form-control form-control-lg" id="title" name="title" type="text" value="" placeholder="Enter your title post..." />
                            <div class="invalid-feedback">A title is required.</div>
                        </div>
                        <!-- Chapo input-->
                        <div class="my-4">
                            <input class="form-control form-control-lg" id="chapo" name="chapo" type="text" value="" placeholder="Enter your chapo..." />
                            <div class="invalid-feedback">A chapo is required.</div>
                        </div>
                        <!-- Content input-->
                        <div class="my-4">
                            <textarea class="form-control form-control-lg" id="content" name="content" type="text" value="" placeholder="Enter your content post..." style="height: 10rem"></textarea>
                            <div class="invalid-feedback">An article is required.</div>
                        </div>
                        <button class="btn btn-primary-outline p-3" id="submitButton" name="submitAddPost" type="submit" value="submit">Add this Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>