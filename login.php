<!-- 상단 헤더 연결 -->
<?php
  include('./sub/header.php')
?>

<!-- 제이쿼리 라이브러리 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="./script/jquery.cookie.js"></script>
<script>
  $(document).ready(function(){
    // 1. 쿠키이름(임의로) 저장
    let key = $.cookie('idChk');
    
    // 2. 만약 브라우저의 key 변수에 값이 저장되어있다면(쿠키가 있다면)
    if(key){
      $('#id_txt').val(key); // id가 id박스안에 표시됨
      $('#id_save').prop('checked',true); // 체크박스에 체크됨
    }

    // 3. 체크박스를 체크하지 않고 다시 체크를 풀 경우
    $('#id_save').change(function(){
      if($(this).is(':checked')){ // is메서드는 체크여부를 true/false로 알려줌
        $.cookie('idChk', $('#id_txt').val(), {expires:7, path:'/'});
      }else{ // 체크를 하지 않은 경우
        // 쿠키 생성하지 않음 또는 기존 쿠키 삭제
        $.removeCookie('idChk', {path:'/'});
      }
    });

    // 4. 아이디 입력시 쿠키 생성
    $('#id_txt').keyup(function(){ // keyup()은 사용자가 키보드를 눌렀다 뗄 때 발생하는 이벤트
      if($('#id_save').is(':checked')){
        $.cookie('idChk', $(this).val(), {expires:7, path:'/'});
      }
    });
  });
</script>

<main>
  <form name="로그인" method="post" action="./php/login_check.php">
    <fieldset>
      <legend>로그인</legend>
      <p>
        <label for="id_txt"></label>
        <input type="text" placeholder="아이디" id="id_txt" name="id_txt">
      </p>
      <p>
        <label for="pw_txt"></label>
        <input type="password" placeholder="비밀번호" id="pw_txt" name="pw_txt">
      </p>
      <p>
        <input type="checkbox" id="id_save">
        <label for="id_save">아이디 저장</label>
      </p>
      <p>
        <input type="submit" value="로그인" id="login_btn">
      </p>
      <p>
        <a href="#" title="아이디 찾기">아이디 찾기</a>
        <a href="#" title="비밀번호 찾기">비밀번호 찾기</a>
        <a href="./php/register.php" title="회원가입">회원가입</a>
      </p>
    </fieldset>
  </form>
</main>

<!-- 하단 푸터 연결 -->
<?php
  include('./sub/footer.php')
?>
</body>
</html>