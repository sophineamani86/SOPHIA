# 🐝 BARCO MILY COMPANY - Ufungaji na Kilimo System
**Website ya Ufungaji wa Asali na Kilimo - Complete Business Solution**

---

## 📋 Muhtasari wa Mfumo

Huu ni mfumo kamili wa web kwa **BARCO MILY COMPANY** unayoangalia:
- **Ufungaji wa Asali** (Beekeeping) 🐝
- **Kilimo** (Agriculture) 🌾
- **Biashara Online** (E-commerce)

Mfumo una sehemu mbili kuu:
1. **Frontend wa Wateja** - Kuangalia bidhaa, jifunza, kuagiza
2. **Backend wa Admin** - Kuongeza bidhaa, rekodi, kusimamia amri

---

## 🗂️ Muundo wa Faili

```
D:\BARCO MILY COMPANY\
├── index.html              # Home page
├── bidhaa.html            # Products page
├── elimu.html             # Education/Learning page
├── mawasiliano.html       # Contact page
├── admin_login.php        # Admin login
├── admin.php              # Admin dashboard
├── admin_logout.php       # Admin logout
├── db.php                 # Database configuration
├── api.php                # Frontend API endpoints
├── submit_contact.php     # Contact form handler
├── styles.css             # Main styling
└── script.js              # JavaScript functionality
```

---

## 🛠️ Setup wa Mfumo

### 1. **Mahitaji ya Mfumo**
- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx web server
- Modern web browser

### 2. **Database Setup**

Mfumo unaundwa database au inakusanyaji kulingana na `db.php`:
- Database: `barco_mily_db`
- Tables: `bidhaa`, `ufugaji`, `kilimo`, `amri`

**Database Connection:**
```php
Host: localhost
User: root
Password: (hakuna)
Database: barco_mily_db
```

Badilisha `db.php` kama connection yako ni tofauti.

### 3. **Installation Steps**

1. **Copy files kwenye web directory:**
   ```
   Copy all files to: C:\xampp\htdocs\barco-mily\
   (au ambapo PHP server yako)
   ```

2. **Create database:**
   - Fungua phpMyAdmin: `http://localhost/phpmyadmin`
   - Click "New" to create database
   - Mfumo utaundwa tables otomatiki

3. **Start server:**
   ```bash
   # Kwa XAMPP
   Start Apache and MySQL
   
   # Kwa command line
   php -S localhost:8000
   ```

4. **Access website:**
   ```
   http://localhost/barco-mily/ (Frontend)
   http://localhost/barco-mily/admin_login.php (Admin)
   ```

---

## 📖 Jinsi ya Kuitumia

### 👥 **Kwa Wateja (Frontend)**

#### 1. **Home Page** (`index.html`)
- Angalia huduma zote
- Kamatia mkakati wa biashara
- Direct links kwa bidhaa na elimu

#### 2. **Bidhaa Page** (`bidhaa.html`)
- Angalia bidhaa zote
- Filter kwa aina: Asali, Vifaa, Nektari, Kilimo
- Ongeza kwenye kadi (cart)
- Kuagiza haraka

#### 3. **Elimu Page** (`elimu.html`)
- Matutoria muhimu kuhusu ufungaji
- Matukio ya asali
- Tips ya kilimo
- Q&A ya tatizo

#### 4. **Mawasiliano** (`mawasiliano.html`)
- Tuma ujumbe
- Habari za mawasiliano
- FAQ

---

### 🔐 **Kwa Admin (Backend)**

#### 1. **Admin Login** (`admin_login.php`)

**Default Credentials:**
```
Username: admin
Password: ufugaji123
```

> **MUHIMU:** Badilisha password katika production!

#### 2. **Admin Dashboard** (`admin.php`)

**Kazi za Admin:**
- ➕ **Ongeza Bidhaa** - Jina, Aina, Bei, Kiwango
- 🐝 **Ongeza Ufugaji** - Idadi, Asali, Bei, Chakula
- 🌾 **Ongeza Kilimo** - Zao, Sehemu, Kiwango, Bei
- 📊 **View Statistics** - Jumla ya bidhaa, amri, rekodi

---

## 🗄️ Database Schema

### Table: `bidhaa` (Products)
```sql
id (INT) - Primary Key
jina (VARCHAR) - Product name
aina (ENUM) - Type: asili, vifaa, nektari, kilimo
bei (INT) - Price in Tsh
kiwango (INT) - Stock quantity
maelezo (TEXT) - Description
picha (VARCHAR) - Image path
imeundwa, imebadilishwa (DATETIME) - Timestamps
```

### Table: `ufugaji` (Beekeeping Records)
```sql
id (INT) - Primary Key
tarehe (DATE) - Date
idadi_mbuzi (INT) - Number of hives
asali_kuzaliana (INT) - Honey produced
asali_kuuzwa (INT) - Honey sold
asali_bei (INT) - Price per kg
chakula_bei (INT) - Feed cost
maelezo (TEXT) - Notes
imeundwa (DATETIME) - Timestamp
```

### Table: `kilimo` (Agriculture Records)
```sql
id (INT) - Primary Key
tarehe (DATE) - Date
zao (VARCHAR) - Crop name
sehemu (DECIMAL) - Land size in acres
kiwango_inchi (INT) - Rainfall inches
asali_kuzaliana (DECIMAL) - Harvest in kg
bei_kwa_kilo (INT) - Price per kg
maelezo (TEXT) - Notes
imeundwa (DATETIME) - Timestamp
```

### Table: `amri` (Orders)
```sql
id (INT) - Primary Key
jina_mteja (VARCHAR) - Customer name
barua_pepe (VARCHAR) - Email
simu (VARCHAR) - Phone
bidhaa_ids (JSON) - Product IDs
idadi_bidhaa (JSON) - Quantities
bei_jumla (INT) - Total price
hali (ENUM) - Status: mpya, inaandaliwa, imetumwa, imekamilika
imeundwa, imebadilishwa (DATETIME) - Timestamps
```

---

## 🎨 Sehemu za Styling

### Color Scheme
- **Primary:** #ff9800 (Orange)
- **Secondary:** #f57c00 (Dark Orange)
- **Text:** #333 (Dark Gray)
- **Background:** #f9f9f9 (Light Gray)

### Responsive Design
- Mobile-friendly
- Tablet optimized
- Desktop layout
- Media queries for all screen sizes

---

## 🔒 Security Tips

### 1. **Change Admin Credentials**
Edit `admin_login.php`:
```php
$admin_user = 'your_new_username';
$admin_pass = 'your_new_password';
```

### 2. **Database Connection**
Edit `db.php` with your credentials:
```php
$dbHost = 'localhost';
$dbName = 'your_db_name';
$dbUser = 'your_db_user';
$dbPass = 'your_db_password';
```

### 3. **HTTPS**
- Use SSL certificate in production
- Update URLs to `https://`

### 4. **Input Validation**
- Always validate user input
- Use prepared statements (already used)
- Sanitize output

---

## 🚀 Deployment

### Local Testing
```bash
# Start PHP server
php -S localhost:8000

# Open in browser
http://localhost:8000
```

### Production Hosting
1. Upload files to web server
2. Create database on MySQL server
3. Update database credentials in `db.php`
4. Ensure PHP extensions enabled: PDO, MySQL
5. Set proper file permissions (chmod 644 for files, 755 for directories)
6. Use HTTPS certificate

---

## 🛠️ API Endpoints

### Frontend API
```
GET /api.php?action=get_bidhaa
  - Returns all available products

POST /api.php?action=submit_order
  - Params: jina, email, simu, bidhaa_ids, idadi, bei_jumla
  - Creates new order
```

---

## 📱 Features

✅ Responsive web design
✅ Product management
✅ Beekeeping records tracking
✅ Agriculture records tracking
✅ Order management system
✅ Customer contact form
✅ Educational content
✅ Admin dashboard
✅ User authentication
✅ Database persistence

---

## 🐛 Troubleshooting

### Database Connection Error
- Check MySQL is running
- Verify credentials in `db.php`
- Ensure database exists

### Admin Login Not Working
- Check credentials in `admin_login.php`
- Ensure sessions are enabled in PHP
- Clear browser cookies

### Products Not Loading
- Check API endpoint is working
- Verify database has records
- Check browser console for errors

### CSS/JS Not Loading
- Verify file paths are correct
- Check file permissions
- Clear browser cache

---

## 📞 Support

**Contact Information:**
- 📱 Phone: +255 789 123 456
- 📧 Email: barcomily@example.com
- 📍 Location: Dar es Salaam, Tanzania

---

## 📄 License

© 2026 BARCO MILY COMPANY. All Rights Reserved.

---

## 🔄 Updates & Maintenance

### Regular Tasks
- Backup database weekly
- Monitor server logs
- Update PHP/MySQL regularly
- Review customer orders
- Update product inventory

### Future Enhancements
- Payment gateway integration
- Email notifications
- SMS alerts
- Mobile app
- Analytics dashboard
- Social media integration

---

**Happy farming and beekeeping! 🐝🌾**
