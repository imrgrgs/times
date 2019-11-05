<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Clube</b></td>
        <td><b>Fundação</b></td>
        <td><b>Apelido</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          {{$clube->full_name}}
        </td>
        <td>
          {{$clube->birthdayFormatted}}
        </td>
        <td>
          {{$clube->nick_name}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>