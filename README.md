# xe-addon-member_block_addon
#설명
커뮤니티 사이트에서 개별 회원들이 자신의 마음에 들지 않는 특정한 타 회원(들)을 차단하여 해당 회원의 글, 쪽지를 보지 않을 수 있게 하는 애드온입니다.

 

#설치, 설정 방법
1. 다운로드 후 ftp 업로드 혹은 쉬운 설치로 설치.
2. 관리자 페이지 -> 회원 -> 회원 설정 -> 회원가입으로 이동
3. '가입 폼 관리'에서 '사용자 정의 항목 추가' 클릭
4. 입력 항목 ID는 'block_list', 형식 '한줄 입력칸(text)', 필수/선택 '선택'으로, 나머지 항목은 자유롭게 입력.
<br>(권장값 : 입력항목 제목 : '차단할 회원', 설명 : '차단하려는 회원의 닉네임을 입력해주세요. 여럿일 경우 쉼표로 구분합니다.')
5. 입력 항목 ID는 'except_block', 형식 '단일 선택(radio)', 필수/선택 '선택'으로, 나머지 항목은 자유롭게 입력.
<br>(권장값 : 입력항목 제목 : '차단된 컨텐츠 숨김', 설명 : '차단한 회원이 작성한 글, 쪽지를 목록에서 숨길지 여부를 선택합니다.')
6. '가입 폼 관리'에서 추가된 '차단할 회원'을 찾아 '공개'에 체크를 해제한 뒤 저장.
7. 관리자 페이지 -> 고급 -> 설치된 애드온에서 '회원 차단 애드온'을 찾아 활성화.

#기능
- 차단할 회원 등록 방법 : 회원정보 보기 -> 회원정보 변경 -> 차단할 회원 입력 항목에 차단할 회원의 닉네임을 정확히 입력. (복수 입력시 띄어쓰기 없이 쉼표로 구분)

- **1. 글/쪽지 : 목록에서 제외 또는 차단 표시**
<br>**차단한 컨텐츠 숨김 설정을 했을 때** : 차단한 회원이 작성한 게시물, 발송한 쪽지를 뺀 게시물/쪽지 만큼만 목록에 보여집니다. 쪽지의 경우 차단한 회원에게 내가 보낸 쪽지 역시 보여지지 않습니다.
<br>(예 : 1 페이지의 20개 게시물/쪽지 중 5개가 차단한 회원의 게시물/쪽지일 경우 15개만 보여짐)
<br>**차단한 컨텐츠 표시 설정을 했을 때** : 차단한 회원이 작성한 게시물, 발송한 쪽지의 경우 목록에 각각 "[차단한 회원이 작성한 글입니다]", "[차단한 회원이 보낸 쪽지 입니다]" 로 표시됩니다.

- **2. 게시물 열람 방지**
: 차단한 회원이 작성한 게시물에 URL 직접 접근등으로 접근 시 경고 메시지가 출력되며 이전 페이지나 메인 페이지로 돌아갑니다.

#기록
- v0.3 (2015. 1. 21) : 차단된 컨텐츠의 목록 노출 여부 지정 옵션 추가
- v0.2 (2015. 1. 13) : 쪽지 차단 추가
- v0.1 (2015. 1. 12) : 최초 릴리즈
