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
        <td><b>Jogador</b></td>
        <td><b>Aniversário</b></td>
        <td><b>Apelido</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          {{$jogador->full_name}}
        </td>
        <td>
          {{$jogador->birthdayFormatted}}
        </td>
        <td>
          {{$jogador->nick_name}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>