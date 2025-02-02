<p align="center"><a href="https://reqponse.com" target="_blank"><img src="https://reqponse.com/assets/logo/logo.svg" width="400" alt="Reqponse Logo"></a></p>

## برمجة وتصميم تطبيق باستخدام Flutter و Laravel

هذا المشروع هو جزء من سلسلة المقالات التعليمية من موقع reqponse بعنوان **برمجة وتصميم تطبيق باستخدام Flutter وLaravel**. تم بناء هذا المشروع في الجزء الأول من السلسلة. لقراءة المقالات يمكنك الضغط على الرابط التالي:

[1- برمجة وتصميم تطبيق باستخدام Flutter و Laravel الجزء الأول](https://reqponse.com/blogs/7/1-brmg-otsmym-ttbyk-bastkhdam-flutter-o-laravel-algzaa-alaol?#content-links).

## المتطلبات التي يجب توافرها قبل الاستمرار في قراءة المقال

عزيزي القارئ، هذه المقالة موجهة لجميع الأشخاص، سواء المبتدئين في **Flutter** و **Laravel** أو المتقدمين فيهما. واليك بعض النقاط المهمة التي ينبغي توافرها لديك قبل الإستمرار في القراءة.

-   **المستوى التعليمي**: من سهل الى صعب.
-   **البرامج المستخدمة**: برنامج **android studio** و **vscode** و **insomnia reset**. `يوجد بدائل`.
-   **لغات البرمجة**: **dart** و **php**.
-   **إطر العمل**: **flutter** و **laravel**.

في برمجة وتصميم التطبيق سوف نستخدم طريقة بناء المشروع حسب المميزات الطريقة موضحة بالكامل في هذا الرابط [بناء مشروع Flutter حسب المميزات](https://reqponse.com/programs/build-a-flutter-project-by-features). سوف نستخدم نظام تسجيل دخول تلقائي وبسيط باستخدام عنوان **IP** للشبكة.

## نظرة عامة على التطبيق الذي نقوم بإنشائه

1. **اسم التطبيق**: فكرة.
2. **وصف مختصر للتطبيق**: يتيح تطبيق **فكرة** للمستخدمين كتابة أفكار مشاريع أو تصاميم أو برامج أو أي فكرة تخطر ببالهم دون إنشاء حساب، ويتم إتاحة هذه الأفكار للعامة.
3. **وصف مفصل للتطبيق**: اقرأ هذا القسم بعناية لأنه يشرح بنية التطبيق بطريقة سهلة ومفهومة.
    - عند دخول المستخدم للتطبيق يتم إنشاء حساب أو يقوم بتسجيل الدخول تلقائياً باستخدام **IP** الشبكة وذلك في صفحة شاشة البداية **splash screen**.
    - بعد لك يتم تحويل المستخدم إلى الصفحة الرئيسية والتي تعرض كافة الأفكار المتوفرة في التطبيق مع إمكانية الفلترة باستخدام الوسوم وأيضاً البحث عن أفكار معينة.
    - يوجد زر يسمح للمستخدم بإضافة فكرة لا تتجاوز **5000 حرف** ولا تقل عن **100 حرف**.
    - يظهر زر تعديل على الفكرة التي أنشأها المستخدم والتي لم يمر على إنشائها أكثر من **8 ساعات**.
    - يظهر كل عنصر فكرة في الصفحة الرئيسية أول 100 حرف فقط وتظهر تفاعلات المستخدم عليها مثل امكانية تحقيق الفكرة وصعوبتها.
4. **تفاعلات المستخدم مع الأفكار**: نضيف **5 أزرار** نصية تسمح للمستخدم بالتفاعل مع الفكرة في صفحة عرض الفكرة، والأزرار هي كما هو موضح في القائمة التالية.
    1. **فكرة لا يمكن تنفيذها**
    2. **فكرة صعبة التنفيذ**
    3. **فكرة سهلة التنفيذ**
    4. **فكرة مكررة**
    5. **فكرة فريدة**
