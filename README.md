# y.k_test
要件

機能一覧

・URL集、
・ヘッダーフッダーの作成
・映画の画像を引っ張ってきてレイアウトを考える


鑑賞提案＆リアクション

機能

・カレンダーを表示させ、日付を押下したら、登録画面に遷移

・登録画面では、見たい作品と、押下した日付を登録する。

・一覧画面では、カレンダーに登録された作品を表示させ、リアクションできるようにする。

登録→suggest、リアクション→reaction

php artisan make:controller suggest&reactionController
pamm suggest_reactionController

php artisan make:migration create_suggest_reaction_table
php artisan make:migration 
php artisan make:model suggest_reaction
 