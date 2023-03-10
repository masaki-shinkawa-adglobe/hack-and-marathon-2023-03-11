# モノレポ対応
Makefile に docker-compose 関連のコマンドをまとめてあります。

## コンテナを起動
コンテナ操作に必要な各種コマンドは、`Makefile`にまとめています。<br />
`make`コマンドを利用することで簡単に操作が可能です。

### Makefileについて
- `make xxx-init`
  - 初期セットアップを行うコマンドです
- `make xxx-build`
  - コンテナをビルドさせるためのコマンドです
- `make xxx-up`
  - コンテナを起動させるためのコマンドです
- `make xxx-down`
  - コンテナをシャットダウンさせるためのコマンドです
- `make xxx-exec args="..."`
  - コンテナ内でコマンド実行する際に利用します。
    `make backend-exec args="php php -v"`
- `make xxx-ps`
  - コンテナのプロセス状況を表示するためのコマンドです

### 初回セットアップ
1. 初回セットアップ用コマンドを実行してDockerイメージを作成します。
```
make xxx-init
```
すべてのinit処理をまとめて行う`make all-init`コマンドを用意しています。

4. コンテナ起動できたら以下のURLにブラウザからアクセスできるか確認してください。
- http://localhost:3000/

### docker compose コマンド

前述のinit系のコマンド実行後は以下のコマンドでコンテナを起動・終了できます。

起動用コマンド
```
make xxx-up
```

終了用コマンド
```
make xxx-down
```

exec 実行コマンド<br />
`args` に `docker compose exec` 以降のパラメータを設定できる
```
make xxx-exec args="front node --version"
```

ps コマンド
```
make xxx-ps
```
