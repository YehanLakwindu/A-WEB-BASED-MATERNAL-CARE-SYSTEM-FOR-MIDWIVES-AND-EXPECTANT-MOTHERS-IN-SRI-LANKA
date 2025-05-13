<h1 align="center">🤱 CraddleSoft</h1>
<h2 align="center">A Web-Based Maternal Care System for Midwives and Expectant Mothers in Sri Lanka</h2>

<p align="center">
  <img src="https://img.shields.io/badge/ICSD--2025-Abstract%20Submitted-blue" />
  <img src="https://img.shields.io/badge/Tech-Stack-orange" />
  <img src="https://img.shields.io/badge/Laravel-10-red" />
  <img src="https://img.shields.io/badge/MySQL-8-blue" />
</p>

---

## 🎯 Abstract Summary

**CraddleSoft** is a role-based maternal care web system designed to enhance maternal health services in Sri Lanka. It streamlines digital health records, clinic scheduling, QR-based identification, and automated notifications for expectant mothers, midwives, and medical officers.

> ✅ **Abstract Submitted to ICSD 2025**  
> � Focus Areas: Digital Health, Midwifery, Public Sector IT, Smart Notifications

---

## 🎬 Live Demo Video

<div align="center">
  <a href="https://www.youtube.com/watch?v=rzXjLoxe6dI">
    <img src="https://i.ytimg.com/vi/rzXjLoxe6dI/maxresdefault.jpg" width="600" alt="Demo Video Thumbnail"/>
  </a>
  <br/>
  <strong>📺 YouTube Demo: <a href="https://www.youtube.com/watch?v=rzXjLoxe6dI">Watch Full Video</a></strong>
</div>

---

## 🔐 Authentication Interfaces

<div align="center">
  <img src="https://github.com/user-attachments/assets/90966829-2b17-4ff4-90fc-c183d1926398" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <img src="https://github.com/user-attachments/assets/7681b35c-494a-42ec-ac78-7fee3135d202" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <p><em>Login Page | Register Page</em></p>
</div>

---

## 🔔 Notification System

<div align="center">
  <img src="https://github.com/user-attachments/assets/95258ae8-2f6f-40a0-a24e-f4674312d00b" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <img src="https://github.com/user-attachments/assets/5f83ffb5-f6c6-4af1-a663-f4eb246e0f1d" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <p><em>Email Notification | WhatsApp Reminder</em></p>
</div>

---

## 🧑‍⚕️ Role-Based Dashboards

<div align="center">
  <img src="https://github.com/user-attachments/assets/6c2513bd-672b-4906-aaa9-0eb2bd535cb9" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <img src="https://github.com/user-attachments/assets/7b33d37d-d937-420f-912d-b0e7805fc10d" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <p><em>Mother Dashboard | Doctor Dashboard</em></p>
  
  <img src="https://github.com/user-attachments/assets/d0cd2615-4580-44c6-be3b-3ec69a14593e" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <img src="https://github.com/user-attachments/assets/5611adfc-176b-4dff-a20d-b625dc15e04c" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <p><em>Midwife Dashboard | Admin Dashboard</em></p>
</div>

---

## 📊 Medical Records Monitoring

<div align="center">
  <img src="https://github.com/user-attachments/assets/70c834a1-61e1-4424-a8fa-f2a21270d7af" width="80%" style="border:1px solid #eee;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.15)"/>
  <p><em>3-Month Antenatal & Postnatal Health Charts</em></p>
</div>

---

## 📎 QR & Digital ID System

<div align="center">
  <img src="https://github.com/user-attachments/assets/8b1a7428-f7ed-484b-9a94-599e2125a860" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <img src="https://github.com/user-attachments/assets/bd600ad3-941e-4cac-8121-4d6f77574a8b" width="45%" style="margin:10px;border:1px solid #eee;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.1)"/>
  <p><em>QR Discount System | Medical Report PDF</em></p>
</div>

---

## 🧪 Tech Stack Architecture

```mermaid
graph TD
    A[Frontend] -->|Laravel Blade| B[Backend]
    A -->|Bootstrap 5| B
    B -->|Eloquent ORM| C[(MySQL Database)]
    B -->|SMTP API| D[Email Notifications]
    B -->|WhatsApp API| E[Mobile Alerts]
    B -->|DOMPDF| F[Report Generation]
    B -->|QR Code Library| G[Digital ID System]
