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

    <table class="table table-bordered">
        <thead>
          <tr>
            <td><b>Jogador</b></td>
            <td><b>Aniversario</b></td>
            <td><b>Apelido</b></td>     
          </tr>
          </thead>
          <tbody>
                @foreach($clube->jogadores as $jogador)
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
          @endforeach
          </tbody>
        </table>

  </body>
</html>