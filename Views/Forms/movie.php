<?php require_once 'inc/html_header.php'; ?>

<form method="post" action="/authors/store<?php if($id): echo "/$id"; endif; ?>">


<div class="form-group row">
        <label for="author_id" class="col-md-2 col-form-label">Author</label>
        <div class="col-md-10">
            <select name="author_id" id="author_id" class="form-control col-sm-12 col-md-6 px-1">
                <option value="">Bitte wählen </option>
                <?php
                    foreach($authors as $author) {
                        if($author['id'] == $data['author_id']){
                            echo "<option selected value='$author[id]'>$author[firstname]$author[lastname]</option>";
                        }else {
                            echo "<option value='$author[id]'>$author[firstname]$author[lastname]</option>";
                        }                     
                    }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="firstname" class="col-md-2 col-form-label">Vorname</label>
        <div class="col-md-10">
            <input type="text" id="firstname" name="firstname" class="form-control col-sm-12 col-md-6 px-1" 
            <?php if (isset($data)) : ?> value="<?php echo $data['firstname'] ?>" <?php endif; ?> required />
        </div>
    </div>

    <div class="form-group row">
        <label for="lastname" class="col-md-2 col-form-label">Nachname</label>
        <div class="col-md-10">
            <input type="text" id="lastname" name="lastname" class="form-control col-sm-12 col-md-6 px-1" 
            <?php if (isset($data)) : ?> value="<?php echo $data['lastname'] ?>" <?php endif; ?> required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-auto float-right">
            <input type="submit" value="Save" role="button" class="btn btn-primary col-md-auto px-5" />
        </div>
    </div>
</form>

<?php require_once 'inc/html_footer.php'; ?>
