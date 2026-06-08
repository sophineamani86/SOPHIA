# 🚀 QUICK START GUIDE - BARCO MILY COMPANY

## ⚡ Haraka Quick Setup (5 dakika)

### Step 1: Download XAMPP
1. Visit: https://www.apachefriends.org/
2. Download XAMPP for Windows
3. Install with default settings

### Step 2: Copy Files
1. Start XAMPP Control Panel
2. Click "Start" on Apache and MySQL
3. Copy all files from: `D:\BARCO MILY COMPANY\`
4. Paste into: `C:\xampp\htdocs\barco-mily\`

### Step 3: Create Database
1. Open: http://localhost/phpmyadmin
2. Click "New" button (left side)
3. Enter name: `barco_mily_db`
4. Click "Create"
5. Done! Database tables auto-create

### Step 4: Test Website
- Frontend: http://localhost/barco-mily/
- Admin: http://localhost/barco-mily/admin_login.php

---

## 🔐 Admin Login

```
Username: admin
Password: ufugaji123
```

**⚠️ Badilisha password baada ya login!**

---

## 📁 File Structure Checklist

- ✅ index.html (Home page)
- ✅ bidhaa.html (Products)
- ✅ elimu.html (Education)
- ✅ mawasiliano.html (Contact)
- ✅ admin_login.php (Admin login)
- ✅ admin.php (Admin dashboard)
- ✅ admin_logout.php (Logout)
- ✅ db.php (Database config)
- ✅ api.php (API endpoints)
- ✅ submit_contact.php (Contact form)
- ✅ styles.css (Styling)
- ✅ script.js (JavaScript)
- ✅ README.md (Documentation)

---

## 🎯 Kazi za Admin

### 1. Login
```
Fungua: admin_login.php
Ingiza: admin / ufugaji123
```

### 2. Ongeza Bidhaa
```
Admin Dashboard → Tab "Ongeza Bidhaa"
Jina: e.g., "Asali Safi 1kg"
Aina: Chagua (Asali, Vifaa, Nektari, Kilimo)
Bei: e.g., 25000 Tsh
Kiwango: Idadi katika ghala
Maelezo: Maelezo fupi kuhusu bidhaa
```

### 3. Ongeza Ufugaji Records
```
Admin Dashboard → Tab "Ongeza Ufugaji"
Tarehe: Leo au tarehe yingine
Idadi ya Mbuzi: Jumla
Asali Kuzaliana: kg inayozaliana
Asali Kuuzwa: kg inayouzwa
Bei: Bei kwa kilo
Chakula: Bei ya chakula
```

### 4. Ongeza Kilimo Records
```
Admin Dashboard → Tab "Ongeza Kilimo"
Tarehe: Leo
Zao: e.g., "Mahindi"
Sehemu: acres
Kiwango: inchi
Asali Kuzaliana: kg
Bei: Bei kwa kilo
```

---

## 📊 Frontend Features

### Home Page
- Overview ya biashara
- Features
- Statistics
- Call-to-action buttons

### Bidhaa Page
- Filter kwa aina
- Product cards
- Add to cart
- Cart storage (LocalStorage)

### Elimu Page
- 4 Lessons kuhusu ufungaji
- Agriculture tips
- Storage information
- Troubleshooting table

### Mawasiliano Page
- Contact information
- Contact form
- FAQ section

---

## 🔧 Configuration

### Database Connection
File: `db.php`
```php
$dbHost = 'localhost';
$dbName = 'barco_mily_db';
$dbUser = 'root';
$dbPass = '';
```

### Admin Credentials
File: `admin_login.php`
```php
$admin_user = 'admin';
$admin_pass = 'ufugaji123';
```

### Company Contact
File: `index.html` (footer)
```
Phone: +255 789 123 456
Email: barcomily@example.com
```

---

## 💾 Backup Database

### Using phpMyAdmin
1. Open: http://localhost/phpmyadmin
2. Select database: `barco_mily_db`
3. Click "Export"
4. Click "Go" to download SQL file

### Manual SQL Backup
```sql
-- Run in phpMyAdmin Query
SELECT * FROM bidhaa;
SELECT * FROM ufugaji;
SELECT * FROM kilimo;
SELECT * FROM amri;
```

---

## 🐛 Common Issues

### Issue: "Cannot connect to database"
**Solution:** 
- Ensure MySQL is running
- Check `db.php` credentials
- Verify database name

### Issue: Admin login not working
**Solution:**
- Clear browser cookies
- Check username/password
- Verify sessions enabled in php.ini

### Issue: Products not showing
**Solution:**
- Add products via admin panel
- Refresh page
- Check browser console (F12)

### Issue: CSS/JS not loading
**Solution:**
- Hard refresh (Ctrl+F5)
- Check file paths
- Verify files in folder

---

## 📈 Next Steps

1. **Add Initial Products**
   - Go to Admin Dashboard
   - Add some sample products
   - Set quantities

2. **Add Sample Records**
   - Add ufugaji records
   - Add kilimo records
   - View statistics

3. **Test Customer Experience**
   - Browse products
   - Read education content
   - Submit contact form

4. **Customize Content**
   - Edit company info
   - Update contact details
   - Add your own lessons
   - Upload product images

---

## 📱 Mobile Optimization

Website is fully responsive for:
- 📱 Mobile phones (320px+)
- 📱 Tablets (768px+)
- 💻 Desktops (1024px+)

---

## 🎨 Customization Tips

### Change Colors
Edit `styles.css`:
```css
/* Change primary color from orange */
--primary-color: #ff9800; /* Change this */
```

### Add Logo
Edit `index.html`:
```html
<!-- Replace emoji with logo image -->
<span>🐝🌾</span>
<!-- To: -->
<img src="logo.png" alt="Logo">
```

### Update Text
All text is in HTML files - easy to edit!

---

## 🌐 Going Live (Hosting)

1. **Get hosting** (GoDaddy, Hostinger, etc.)
2. **Upload files** via FTP
3. **Create database** on hosting panel
4. **Update db.php** with hosting credentials
5. **Enable HTTPS** via SSL certificate

---

## 📞 Support Contacts

- 📧 Email: barcomily@example.com
- 📱 Phone: +255 789 123 456
- 📍 Location: Dar es Salaam, Tanzania

---

## ✅ Checklist Before Launch

- [ ] Database created and tables initialized
- [ ] Admin credentials changed from default
- [ ] Products added to catalog
- [ ] Contact information updated
- [ ] Website tested on mobile
- [ ] All links working correctly
- [ ] Images (if any) uploaded
- [ ] HTTPS enabled (if live)
- [ ] Backups scheduled
- [ ] Testing on different browsers

---

**Karibu! Mfumo ni tayari.** 🎉

Kama una swali, tafadhali jifunze README.md kwa details zaidi.
