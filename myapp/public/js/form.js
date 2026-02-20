const cells = document.querySelectorAll('.day-cell');
const shifts = {};


cells.forEach(cell => {
    const form = cell.querySelector('.shift-form');
    const select = cell.querySelector('.time-range');
    const display = cell.querySelector('.shift-display');

    // 日付クリック
    cell.addEventListener('click', (e) => {
        e.stopPropagation();

        // 他を閉じる
        document.querySelectorAll('.shift-form').forEach(f => {
            if (f !== form) {
                f.classList.add('hidden');
            }
        });

        form.classList.remove('hidden');

        // 即プルダウン開く
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

    // フォーム内クリックは閉じない
    form.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // 選択したら閉じる
    if (select) {
        select.addEventListener('change', () => {
            const date = cell.dataset.date;   // ← 追加
        
            display.textContent = select.value;
        
            shifts[date] = select.value;      // ← 追加（保存）
        
            console.log(shifts);
            
            form.classList.add('hidden');
        });
        
    }
});

// 外クリックで閉じる（←ここは1回だけ！）
document.addEventListener('click', (e) => {
    if (!e.target.closest('.day-cell')) {
        document.querySelectorAll('.shift-form').forEach(form => {
            form.classList.add('hidden');
        });
    }
});

const form = document.querySelector('form');
form.addEventListener('submit', (e) => {
    const input = document.getElementById('shiftsInput');
    input.value = JSON.stringify(shifts);
    console.log('送信前のhidden:', input.value);
});


