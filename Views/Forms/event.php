<?php require_once 'inc/html_header.php'; ?>

<form  method="post" action="/events/store<?php if($id): echo "/$id"; endif; ?>">

    <div class="form-group row">
        <label for="category_id" class="col-md-2 col-form-label">Kategorie</label>
        <div class="col-md-10">
        <select name="category_id" id=""  class="form-control col-sm-12 col-md-6 px-1" required>
            <?php foreach($categories as $category) { ?>
                <option value="<?php echo $category['id'] ?>" <?php if(isset($data) && $data['category_id'] === $category['id']) {echo 'selected';} ?>>
                    <?php echo $category['name']; ?>
                </option>
            <?php } ?>
        </select>            
        </div>
    </div>

    <div class="form-group row">
        <label for="title" class="col-md-2 col-form-label">Titel</label>
        <div class="col-md-10">
            <input type="text" id="title" name="title" class="form-control col-sm-12 col-md-6 px-1" 
            <?php if (isset($data)) : ?> value="<?php echo $data['title'] ?>" <?php endif; ?> required />
        </div>
    </div>

    <div class="form-group row">
        <label for="event_date" class="col-md-2 col-form-label">Datum</label>
        <div class="col-md-10">
            <input type="text" id="event_date" name="event_date" class="form-control col-sm-12 col-md-6 px-1" 
            <?php if (isset($data)) : ?> value="<?php echo $data['event_date'] ?>" <?php endif; ?> required />
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-2 col-form-label">Beschreibung</label>
        <div class="col-md-10">
                <textarea name="description" id="description" cols="30" rows="10" class="form-control col-sm-12 col-md-6 px-1"><?php if (isset($data)){echo $data['description'];}?></textarea>            
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-auto float-right">
            <input type="submit" value="Save" role="button" class="btn btn-primary col-md-auto px-5" />
        </div>
    </div>
</form>

<?php require_once 'inc/html_footer.php'; ?>
