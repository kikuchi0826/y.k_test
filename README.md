# y.k_test
要件

機能一覧

・URL集、
・ヘッダーフッダーの作成
・映画の画像を引っ張ってきてレイアウトを考える


上映スケジュール

・上映フラグをtrueにしたものだけを表示する。
・一覧画面を用意して、
    上映開始時間（日にちと時間）
    作品名
    URL
を表示させる
※日付ごとに表示できれば、なお、良し

鑑賞提案

機能

・カレンダーを表示させ、日付を押下したら、登録画面に遷移

・登録画面では、見たい作品と、押下した日付を登録する。

※実装済み

リアクション機能

・ユーザーテーブルとスケジュールテーブルの中間テーブルを作ってリアクション機能を実装する

・リアクションは中間テーブルにリアクションカラムを用意し、trueでリアクション済み、
  falsで、リアクション未を判別する。

・中間テーブルには、ログイン時に自分のIDを保持、作品のIDで管理

・リアクションカラムがtrueのものが、3つ以上あれば、上映フラグをtrueにする

項目

・作品名

・現在の人数

・作品内容（URLか内容）

・備考

・リアクションボタン

・リアクション取り消しボタン

スケジュールテーブルに提案者idのカラムを追加
提案者の場合、リアクションボタンを非表示、提案を取り下げるボタンを表示
それ以外はリアクションボタンを表示
リアクションボタンは、リアクションフラグがtlueまたは、レコードがない場合、活性化、リアクションを取り下げるボタンは不活性化。
リアクションボタンはカウント関数でリアクションフラグがtlerのものだけ、数えて表示するか、スケジュールカラムで、数字で管理。

pamc reactionScheduleController
pamm reactionScheduleController

RENAME TABLE reaction TO reactions

DELETE FROM reactions;
