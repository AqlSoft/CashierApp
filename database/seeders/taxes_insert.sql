-- تعطيل فحص المفاتيح الأجنبية مؤقتًا
SET FOREIGN_KEY_CHECKS=0;

-- حذف البيانات الموجودة
TRUNCATE TABLE `taxes`;

-- إعادة ضبط العداد التلقائي
ALTER TABLE `taxes` AUTO_INCREMENT = 1;

-- إدراج الضرائب الافتراضية
INSERT INTO `taxes` (`tax_code`, `tax_name_ar`, `tax_name_en`, `tax_rate`, `tax_type`, `is_active`, `is_default`, `is_inclusive`, `effective_from`, `effective_to`, `gl_account_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
('VAT-15', 'ضريبة القيمة المضافة 15%', 'VAT 15%', 15.0000, 'PERCENTAGE', 1, 1, 0, NULL, NULL, NULL, NOW(), NOW(), NULL),
('VAT-5', 'ضريبة القيمة المضافة 5%', 'VAT 5%', 5.0000, 'PERCENTAGE', 1, 0, 0, NULL, NULL, NULL, NOW(), NOW(), NULL),
('ZERO-RATE', 'ضريبة صفر%', 'Zero Rate', 0.0000, 'PERCENTAGE', 1, 0, 0, NULL, NULL, NULL, NOW(), NOW(), NULL),
('EXEMPT', 'معفاة من الضريبة', 'Tax Exempt', 0.0000, 'PERCENTAGE', 1, 0, 0, NULL, NULL, NULL, NOW(), NOW(), NULL);

-- إعادة تفعيل فحص المفاتيح الأجنبية
SET FOREIGN_KEY_CHECKS=1;
