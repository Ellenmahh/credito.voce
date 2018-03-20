<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form (ngSubmit)="onSubmit()" #myForm="ngForm">

 <div class="form-group">
  <label for="firstname">First Name</label>
  <input type="text" class="form-control" id="firstname"
   required [(ngModel)]="firstname" name="firstname">
 </div>

 <div class="form-group">
  <label for="middlename">Middle Name</label>
  <input type="text"  class="form-control" id="middlename"
   [(ngModel)]="middlename" name="middlename">
 </div>

 <div class="form-group">
  <label for="lastname">Last Name</label>
  <input type="text"  class="form-control" id="lastname"
   required minlength = '2' maxlength="6" [(ngModel)] = "lastname" name="lastname">
 </div>

 <div class="form-group">
  <label for="mobnumber">Mob Number</label>
  <input type="text"  class="form-control" id="mobnumber"
   minlength = '2' maxlength="10" pattern="^[0-9()\-+\s]+$"
   [(ngModel)] = "mobnumber" name="mobnumber">
 </div>

 <button type="submit" [disabled]="!myForm.form.valid">Submit</button>

</form>
  </body>
</html>
