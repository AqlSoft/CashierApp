-- تعطيل فحص المفاتيح الأجنبية مؤقتًا
SET FOREIGN_KEY_CHECKS=0;

-- حذف البيانات الموجودة
TRUNCATE TABLE `tax_group_mappings`;
TRUNCATE TABLE `tax_groups`;

-- إعادة ضبط العدادات التلقائية
ALTER TABLE `tax_groups` AUTO_INCREMENT = 1;
ALTER TABLE `tax_group_mappings` AUTO_INCREMENT = 1;

-- إدراج المجموعات الضريبية
INSERT INTO `tax_groups` (`group_code`, `group_name_ar`, `group_name_en`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
('VAT-GRP', 'مجموعة ضريبة القيمة المضافة', 'VAT Group', 'مجموعة ضريبة القيمة المضافة الأساسية', 1, NOW(), NOW(), NULL),
('TAX-EXEMPT', 'مجموعة معفاة من الضرائب', 'Tax Exempt Group', 'مجموعة للعناصر المعفاة من الضرائب', 1, NOW(), NOW(), NULL),
('ZERO-RATE', 'مجموعة الضريبة صفر%', 'Zero Rate Tax Group', 'مجموعة للعناصر ذات الضريبة صفر%', 1, NOW(), NOW(), NULL);

-- إدراج العلاقات بين الضرائب والمجموعات
-- ملاحظة: تأكد من أن معرفات الضرائب تتطابق مع القيم الموجودة في جدول الضرائب
SET @vat15_id = (SELECT id FROM `taxes` WHERE `tax_code` = 'VAT-15' LIMIT 1);
SET @vat5_id = (SELECT id FROM `taxes` WHERE `tax_code` = 'VAT-5' LIMIT 1);
SET @zero_rate_id = (SELECT id FROM `taxes` WHERE `tax_code` = 'ZERO-RATE' LIMIT 1);
SET @exempt_id = (SELECT id FROM `taxes` WHERE `tax_code` = 'EXEMPT' LIMIT 1);

-- إضافة الضرائب إلى المجموعات
-- مجموعة ضريبة القيمة المضافة
SET @vat_group_id = (SELECT id FROM `tax_groups` WHERE `group_code` = 'VAT-GRP' LIMIT 1);
INSERT INTO `tax_group_mappings` (`tax_group_id`, `tax_id`, `display_order`, `created_at`, `updated_at`) VALUES
(@vat_group_id, @vat15_id, 1, NOW(), NOW()),
(@vat_group_id, @vat5_id, 2, NOW(), NOW());

-- مجموعة المعفاة من الضرائب
SET @exempt_group_id = (SELECT id FROM `tax_groups` WHERE `group_code` = 'TAX-EXEMPT' LIMIT 1);
INSERT INTO `tax_group_mappings` (`tax_group_id`, `tax_id`, `display_order`, `created_at`, `updated_at`) VALUES
(@exempt_group_id, @exempt_id, 1, NOW(), NOW());

-- مجموعة الضريبة صفر%
SET @zero_rate_group_id = (SELECT id FROM `tax_groups` WHERE `group_code` = 'ZERO-RATE' LIMIT 1);
INSERT INTO `tax_group_mappings` (`tax_group_id`, `tax_id`, `display_order`, `created_at`, `updated_at`) VALUES
(@zero_rate_group_id, @zero_rate_id, 1, NOW(), NOW());

-- إعادة تفعيل فحص المفاتيح الأجنبية
SET FOREIGN_KEY_CHECKS=1;
