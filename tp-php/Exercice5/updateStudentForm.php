<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    div {
        width: fit-content;
        height: fit-content;
        margin: auto;
        padding: 20px;
    }
    button {
        float: right;
    }
    a {
        position: absolute;
        bottom: 0;
        right: 0;
    }
    p {
        color: red;
    }
</style>
<body>
    <div class="alert alert-warning">
        <form method="post" action="updateStudent.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
            <input type="checkbox" class="form-check-input" name="imageCheckBox" value="1">
            Update image  
            <br>
            Upload new image: <br>
            <input type="file" class="form-control" name="imageFile" accept="image/*">
            <br>

            <input type="checkbox" class="form-check-input" name="sectionCheckBox" value="1">
            Update section  
            <br>
            New section:<br>
            <input type="number" name="section" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <a href="./studentList.php">
        <button class="btn btn-primary">Go Back</button>
    </a>
</body>
