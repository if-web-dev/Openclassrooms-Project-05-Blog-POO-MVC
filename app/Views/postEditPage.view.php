<div class="container">
    
    <h1 class="my-5 text-center">Update a post</h1>
    <!-- Create an Article -->
    <div class="card shadow my-5">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Update a Post</h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-center mb-5">
                <div>
                    <form method="post" action="postProcessing?id=">
                         <!-- Category input-->
                         <div class="my-4">
                            <select class="form-control form-control-lg" name="category" id="category">
                               
                                    <option value="">
                                        
                                    </option>
                                
                            </select>
                            <div class="invalid-feedback">A category is required.</div>
                        </div>
                        <!-- title input-->
                        <div class="my-4">
                            <input class="form-control form-control-lg" id="title" name="title" type="text" value=""/>
                            <div class="invalid-feedback">A title is required.</div>
                        </div>
                        <!-- Chapo input-->
                        <div class="my-4">
                            <input class="form-control form-control-lg" id="chapo" name="chapo" type="text" value="" />
                            <div class="invalid-feedback">A chapo is required.</div>
                        </div>
                        <!-- Content input-->
                        <div class="my-4">
                            <textarea class="form-control form-control-lg" id="content" name="content" type="text" style="height: 10rem"><textarea>
                            <div class="invalid-feedback">An article is required.</div>
                        </div>
                        <input type="hidden" id="id" name="id" value="">
                        <button class="btn btn-primary py-3" id="submitButton" name="submitEditPost" type="submit" value="submit">Modifie this Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>