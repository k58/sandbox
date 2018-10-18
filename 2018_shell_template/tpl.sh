#!/bin/sh -f
################################################################
#
#  ログ出力テンプレート
#
################################################################

# -- [ 変数設定 ] ----------------------------------------------
# --------------------------------------------------------------
# 現在時刻
declare -i NOW=10#$(date '+%H%M%S')  # 文字列→10進数変換

# OK/NG
OK_A="0"  # OK
NG_B="1"  # ERROR: ちがう
NG_C="2"  # ERROR: だめ

# 終了コード
FIN="${OK_A}"

# ディレクトリパス
HOME="/home/user"

# ログ設定
mkdir -p "${HOME}/log"
LOG="${HOME}/log/tpl_$(date '+%Y%m%d%H%M').log"  # ログファイル名
exec 5>> "${LOG}"                            # ファイルディスクリプタ5をログ出力
BASH_XTRACEFD="5"                            # xtraceをファイルディスクリプタ5に出力
PS4='${LINENO}: ${FUNCNAME:+$FUNCNAME(): }'  # xtraceログ表示設定


# -- [ ログ出力 function ] -------------------------------------
# --------------------------------------------------------------
function LOGMSG() {  # ログ出力（本体）
    TIMESTAMP="$1TIME: $(date '+%Y/%m/%d %H:%M:%S')"
    HR="--------------------------------"
    for loop in "${HR}" "${@:2}" "${TIMESTAMP}" "${HR}"; do
        echo "${loop}"
    done
}

# -- [ 処理結果 function ] -------------------------------------
# --------------------------------------------------------------
function ERR() {  # 処理結果
    (( ${FIN} == ${OK_A} )) && FIN="$1"
}


# ==============================================================
#  ▼▼▼ 処理ここから ▼▼▼
# ==============================================================
{
  # -- [ 処理開始ログ出力 ] ------------------------------------
  # ------------------------------------------------------------
  echo "☆ これもログに出ます ☆"
  ARRAY=()
  ARRAY+=("ログメッセージ配列1")        # ログメッセージ配列
  ARRAY+=("ログメッセージ配列2")        # ログメッセージ配列
  ARRAY+=("ログメッセージ配列3")        # ログメッセージ配列
  LOGMSG "START  " "${ARRAY[@]}"        # ログ出力（ログ配列）
  set -x                                # xtrace(-x) 出力[開始]

  # -- [ 主処理 ] ----------------------------------------------
  # ------------------------------------------------------------
  # 【【【 なんか処理 】】】

  # -- [ 処理終了ログ出力 ] ------------------------------------
  # ------------------------------------------------------------
  set +x                                # xtrace(-x) 出力[終了]
  source "${HOME}/comn_msg.sh" "${FIN}" # 終了コードメッセージ文取得
  ARRAY=()
  ARRAY+=("MESSAGE: ${MSG}")            # ログメッセージ配列
  LOGMSG "FINISH " "${ARRAY[@]}"        # ログ出力（ログ配列）

} | tee -a "${LOG}" 2>&1                # echoをログファイルへ出力
# ==============================================================
#  ▲▲▲ 処理ここまで ▲▲▲
# ==============================================================

exit "${FIN}"