const cells = document.querySelectorAll('.day-cell');
const shifts = {};

// 各セルの処理
cells.forEach(cell => {
    const form = cell.querySelector('.shift-form');
    const select = cell.querySelector('.time-range');
    const display = cell.querySelector('.shift-display');

    // 日付クリックでフォーム表示
    cell.addEventListener('click', (e) => {
        e.stopPropagation();

        document.querySelectorAll('.shift-form').forEach(f => {
            if (f !== form) f.classList.add('hidden');
        });

        form.classList.remove('hidden');

        requestAnimationFrame(() => {
            if (select) {
                select.focus();
                select.dispatchEvent(new MouseEvent('mousedown', {
                    bubbles: true,
                    cancelable: true,
                    view: window
                }));
            }
        });
    });

    form.addEventListener('click', (e) => e.stopPropagation());

    // 選択変更時
    if (select) {
        select.addEventListener('change', () => {
            const date = cell.dataset.date;
            display.textContent = select.value;

            // 空文字は削除、◎や時間は保存
            if (select.value === '') {
                delete shifts[date];
            } else {
                shifts[date] = select.value;
            }

            form.classList.add('hidden');
            console.log(shifts);
        });
    }
});

// 外クリックで閉じる
document.addEventListener('click', () => {
    document.querySelectorAll('.shift-form').forEach(form => form.classList.add('hidden'));
});

// 送信前に hidden にセット
const form = document.querySelector('form');
form.addEventListener('submit', (e) => {
    const input = document.getElementById('shiftsInput');
    input.value = JSON.stringify(shifts);
    console.log('送信前のhidden:', input.value);
});
