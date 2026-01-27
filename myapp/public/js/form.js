const cells = document.querySelectorAll('.day-cell');
const shifts = {};

cells.forEach(cell => {
    const form = cell.querySelector('.shift-form');
    const select = cell.querySelector('.time-range');
    const display = cell.querySelector('.shift-display');

    // 日付セルクリックで開く
    cell.addEventListener('click', (e) => {
        e.stopPropagation();

        document.querySelectorAll('.shift-form').forEach(f => {
            if (f !== form) {
                f.classList.add('hidden');
            }
        });

        form.classList.remove('hidden');
    });

    // フォーム内クリックは閉じない
    form.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // ★ 選択したら閉じる
    if (select) {
        select.addEventListener('change', () => {
            if (display) {
                display.textContent = select.value;
            }
            form.classList.add('hidden');
        });
    }
});

// 画面のどこかをクリックしたら全部閉じる
document.addEventListener('click', () => {
    document.querySelectorAll('.shift-form').forEach(form => {
        form.classList.add('hidden');
    });
});

function sendShift() {
    document.querySelectorAll('.day-cell').forEach(cell => {
        const date = cell.dataset.date;
        if (!date) return;

        const work = cell.querySelector('.work-type')?.value;
        const time = cell.querySelector('.time-range')?.value;

        if (work) {
            shifts[date] = { work, time };
        }
    });

    document.getElementById('shiftsInput').value =
        JSON.stringify(shifts);
}
