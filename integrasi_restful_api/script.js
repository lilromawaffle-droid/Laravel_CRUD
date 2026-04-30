function populateTable(siswaList) {
    const tbody = document.querySelector('.table tbody');
    tbody.innerHTML = '';

    if (!Array.isArray(siswaList)) {
        siswaList = siswaList.data || [];
    }

    if (siswaList.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" style="text-align: center; padding: 20px;">Tidak ada data siswa</td></tr>';
        return;
    }

    siswaList.forEach(siswa => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${siswa.id || siswa.nis || '-'}</td>
            <td>${siswa.nama_lengkap || siswa.nama || '-'}</td>
            <td>${siswa.jk || '-'}</td>
            <td>${siswa.golongan_darah || siswa.golonganDarah || '-'}</td>
            <td>
                <div class="action-buttons">
                    <button class="btn btn-warning" onclick="goToEditForm(${siswa.id || siswa.nis})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteData(${siswa.id || siswa.nis})">Hapus</button>
                </div>
            </td>
        `;
        tbody.appendChild(row);
    });
}