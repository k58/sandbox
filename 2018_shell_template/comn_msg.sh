#!/bin/sh -f
################################################################
#
#  メッセージ一覧
#
################################################################

# -- [ 変数設定 ] ----------------------------------------------
# --------------------------------------------------------------
# 終了コード（引数）
FIN="$1"

# ==============================================================
#  ▼▼▼ 処理ここから ▼▼▼
# ==============================================================
case "${FIN}" in
    0)
        MSG="OK"
        break;;
    1)
        MSG="ちがう"
        break;;
    2)
        MSG="だめ"
        break;;
    * )
        MSG="異常値"
        break;;
esac
# ==============================================================
#  ▲▲▲ 処理ここまで ▲▲▲
# ==============================================================