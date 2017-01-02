<div class="container margin-block">
    <div class="container margin-block text-center">
    <script src="../js/searching_phone_email.js"></script>
        <script>
          function validate()
          {
            var result = true;
            if (validate_email(document.getElementById("searching_email"))) 
              result = true;
            else result = false;
            return result;
          }
        </script>
        <div class="navbar-form" id="search_phone_email" id="searching_phone_email">
          <div class="form-group">
            <input type="text" placeholder="Email" class="form-control" id="searching_email" onkeyup="validate_email(this)" onchange="validate_email(this)">
          </div>
          <div class="form-group">
            <button class="btn btn-success" onclick="if (validate()) {search_email()};">Recover password</button> 
          </div>      
        </div>
    </div>
</div>