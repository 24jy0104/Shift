let calendar = document.getElementById('calendar');
let selectedShifts = {};

const year = 2025;
const month = 9; // 10月（0始まりなので9）
const lastDay = 31;

// 候補データ
const data = ['〇', '17時', '17時15分', '17時30分', '18時'];

let currentDropdown = null;

// 日付ボタン生成
for (let day = 1; day <= lastDay; day++) {
    const dateStr = `${year}-10-${day.toString().padStart(2, '0')}`;
    const btn = document.createElement('button');
    btn.textContent = day;
    btn.dataset.date = dateStr;

    const selectedItemDiv = document.createElement('div');
    selectedItemDiv.classList.add('selected-item');
    
    selectedShifts[dateStr] = "17時";
    selectedItemDiv.textContent = "17時";
    
    btn.appendChild(selectedItemDiv);

    btn.addEventListener('click', (e) => {
        e.stopPropagation();

        // 既存のドロップダウンを閉じる
        if (currentDropdown) {
            currentDropdown.remove();
            currentDropdown = null;
        }

        const container = document.createElement('div');
        container.classList.add('dropdown-container');

        // 候補をボタンで生成
        data.forEach(optionText => {
            const optBtn = document.createElement('button');
            optBtn.textContent = optionText;

            optBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                selectedShifts[dateStr] = optionText;
                selectedItemDiv.textContent = optionText;
                container.remove();
                currentDropdown = null;
            });

            container.appendChild(optBtn);
        });

        btn.appendChild(container);
        currentDropdown = container;
    });

    calendar.appendChild(btn);
}

// 外をクリックで閉じる
document.addEventListener('click', (e) => {
    if (
        currentDropdown &&
        !currentDropdown.contains(e.target) &&
        !e.target.closest('button')
    ) {
        currentDropdown.remove();
        currentDropdown = null;
    }
});

// 提出ボタン
function sendShift() {
    if (Object.keys(selectedShifts).length === 0) {
        alert("シフトが選択されていません！");
        return;
    }
    localStorage.setItem("shiftData", JSON.stringify(selectedShifts));
    alert("シフトを提出しました！");
}

// 確認ボタン


function goToCheckPage() {
    const stored = localStorage.getItem("shiftData");
    // if (!stored) {
    //     alert("提出されたシフトはまだありません！");
    //     return;
    // }
    // ✅ ページ遷移
    window.location.href = "shift_form.blade.php";
}