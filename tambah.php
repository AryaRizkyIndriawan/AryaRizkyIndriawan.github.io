<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  // cek apakah data berhasil di tambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "<script>
		alert('data berhasil ditambahkan');
		document.location.href = 'pages/UI/data.php';
		</script>";
  } else {
    echo "<script>
		alert('data gagal ditambahkan');
		document.location.href = 'pages/UI/data.php';
		</script>";
    // echo "gagal";
    // echo "<br>";
    // echo mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah data mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
  <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="https://m.youtube.com/channel/UCwp6vwQcR5DfCrdJIUHtMEA" target="_blank" class="btn btn-default btn-flat" onClick="javascript:alert('Bantu klik subscribe ya bro :) ');"><b>&copy; Arya Rizky Web</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light">
                  <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i> Light
                </button>
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark">
                  <i class="bi bi-moon-stars-fill me-2 opacity-50" data-theme-icon="bi-moon-stars-fill"></i> Dark
                </button>
              </li>
            </ul>
          </li>
        </ul>
        </li>
        </ul>
      </div>
  </nav> -->
  <div class="container my-3">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 class="my-3">Tambah data mahasiswa</h2>
        <form method="post" autocomplete="off" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="nim_mhs" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="nim_mhs" name="nim_mhs" autofocus required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama_mhs" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tahun_ajaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
              <!-- <input type="text" class="form-control" id="jurusan" name="jurusan" required> -->
              <select class="form-select" id="jurusan" name="jurusan" required>
                <option selected>-- Pilih Jurusan Prodi --</option>
                <option value="S1 Desain Grafis">S1 Desain Grafis</option>
                <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
                <option value="S1 Sistem Komputer">S1 Sistem Komputer</option>
                <option value="S1 Manajemen">S1 Manajemen</option>
                <option value="D4 Komputerisasi Akuntansi">D4 Komputerisasi Akuntansi</option>
                <option value="D4 Manajemen Informatika">D4 Manajemen Informatika</option>
                <option value="D3 Bisnis">D3 Bisnis</option>
                <option value="D3 Manajemen Perdagangan">D3 Manajemen Perdagangan</option>
                <option value="D3 Kewirausahaan">D3 Kewirausahaan</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="no_hp" class="col-sm-2 col-form-label">Nomor Hp</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="no_hp" name="no_hp" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
              <!-- <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required> -->
              <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option selected>-- Pilih Gender --</option>
                <option value="Laki-Laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
              <div class="mb-3">
                <input class="form-control" type="file" id="gambar" name="gambar">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit"><i class="fa-solid fa-file-circle-plus"></i> Tambah Data</button>
          <a class="btn btn-warning" href="pages/UI/data.php" role="button"><i class="fa-solid fa-circle-left"></i> Back</a>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- <script>
    /*!
     * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
     * Copyright 2011-2023 The Bootstrap Authors
     * Licensed under the Creative Commons Attribution 3.0 Unported License.
     */

    (() => {
      'use strict'

      const getStoredTheme = () => localStorage.getItem('theme')
      const setStoredTheme = theme => localStorage.setItem('theme', theme)

      const getPreferredTheme = () => {
        const storedTheme = getStoredTheme()
        if (storedTheme) {
          return storedTheme
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
      }

      const setTheme = theme => {
        if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.setAttribute('data-bs-theme', 'dark')
        } else {
          document.documentElement.setAttribute('data-bs-theme', theme)
        }
      }

      setTheme(getPreferredTheme())

      const showActiveTheme = (theme, focus = false) => {
        const themeSwitcher = document.querySelector('.theme-icon-active')

        if (!themeSwitcher) {
          return
        }

        const themeSwitcherText = document.querySelector('.theme-icon-active')
        const activeThemeIcon = document.querySelector('.theme-icon-active')
        const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
        const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon

        document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
          element.classList.remove('active')
          element.setAttribute('aria-pressed', 'false')
        })

        btnToActive.classList.add('active')
        btnToActive.setAttribute('aria-pressed', 'true')
        activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive)
        activeThemeIcon.classList.add(iconOfActiveBtn)
        activeThemeIcon.dataset.iconActive = iconOfActiveBtn
        const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
        themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

        if (focus) {
          themeSwitcher.focus()
        }
      }

      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        const storedTheme = getStoredTheme()
        if (storedTheme !== 'light' && storedTheme !== 'dark') {
          setTheme(getPreferredTheme())
        }
      })

      window.addEventListener('DOMContentLoaded', () => {
        showActiveTheme(getPreferredTheme())

        document.querySelectorAll('[data-bs-theme-value]')
          .forEach(toggle => {
            toggle.addEventListener('click', () => {
              const theme = toggle.getAttribute('data-bs-theme-value')
              setStoredTheme(theme)
              setTheme(theme)
              showActiveTheme(theme, true)
            })
          })
      })
    })()
  </script> -->
</body>

</html>
