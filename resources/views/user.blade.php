@extends('template.general')

@section('user')
    <section id="user-cont">
        <div class="row" id="full-page">
            <div class="col-md-2 col-sm-2">
                <div class="profile-sidebar">
                    <div class="profile-user">
                        <div class="profile-name text-center">
                            <h1 class="p-4">MENÚ</h1><hr>
                        </div>
                    </div>
                    <nav class="profile-menu">
                        <h4 onclick="reveal('Text1');">Perfil</h4><hr>
                        <h4 onclick="reveal('Text2');">Estadisticas</h4><hr>
                        <h4 onclick="reveal('Text3');">Trofeos</h4><hr>
                        <h4 onclick="reveal('Text4');">Ayuda</h4><hr class="mb-0">
                    </nav>
                </div>
            </div>
            <div id="user-data" class="col-md-10 col-sm-2">
                <span class="myHiddenText" id="Text1">
                    Hidden text 1
                </span>
                <span class="myHiddenText" id="Text2">
                    Hidden text 2
                </span>
                <span class="myHiddenText" id="Text3">
                    <div class="container bg-black">
                        sdd
                    </div>
                </span>
                <span class="myHiddenText" id="Text4">
                    Hidden text 4
                </span>
            </div>
        </div>
    </section>
    <script>
        function reveal(id) {
  var e = document.getElementById(id);
  if (e.style.display == 'inline') {
    e.style.display = 'none';
  } else {
    var allTexts = document.querySelectorAll(".myHiddenText");
    for (var i = 0, len = allTexts.length; i < len; i++) {
      allTexts[i].style.display = 'none';
    }
    e.style.display = 'inline';
  }
}
    </script>
@endsection
