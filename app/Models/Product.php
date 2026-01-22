<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'promotion',
        'description',
        'status',
        'thumbnail_path',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'status' => 'boolean',
        'price' => 'decimal:2',
        'promotion' => 'decimal:2',
    ];

    protected $sampleReviews = [
        // Rất ngắn
        'Bé thích lắm.',
        'Chơi vui.',
        'Nhìn dễ thương.',
        'Đúng mô tả.',
        'Ổn trong tầm giá.',
        'Bé chơi được.',
        'Không cần pin.',
        'Vặn cót là chạy.',
        'Nhỏ gọn.',
        'Màu đẹp.',
    
        // Ngắn
        'Bé chơi rất vui, không chán.',
        'Đồ chơi dễ thương, nhìn là thích.',
        'Kích thước vừa tay bé.',
        'Vặn dây cót nhẹ, bé tự chơi được.',
        'Hình dáng ngộ nghĩnh, đáng yêu.',
        'Mua về bé chơi liền.',
        'Không có mùi nhựa khó chịu.',
        'Chất liệu nhìn khá ổn.',
        'Phù hợp cho bé nhỏ tuổi.',
        'Giá tiền hợp lý.',
    
        // Trung bình
        'Đồ chơi nhỏ gọn, bé cầm rất vừa tay. Cơ chế dây cót hoạt động ổn.',
        'Bé nhà mình rất thích mấy đồ chơi có thể tự chạy như thế này.',
        'Chất liệu nhựa ổn, bề mặt nhẵn, không có cạnh sắc.',
        'Không cần dùng pin nên khá tiện, bé tự chơi được.',
        'Mua cho con chơi ở nhà, thấy con chơi cũng khá lâu.',
        'Thiết kế đơn giản nhưng nhìn rất vui nhộn.',
        'Hàng nhận được giống hình, không bị trầy xước.',
        'Bé chơi được nhiều lần mà chưa thấy hỏng.',
        'Phù hợp cho bé từ 3 tuổi trở lên.',
        'Đóng gói cẩn thận khi giao hàng.',
    
        // Dài
        'Đồ chơi nhìn nhỏ nhưng khá chắc tay. Bé nhà mình 3 tuổi vặn cót nhẹ là chơi được ngay.',
        'Mua về cho bé chơi thử nhưng không ngờ bé thích như vậy, chơi suốt buổi.',
        'Chất liệu nhựa không có mùi khó chịu nên khá yên tâm cho trẻ nhỏ.',
        'Bé rất thích vì đồ chơi tự bò tới, nhìn rất vui và hài hước.',
        'So với mức giá thì chất lượng khá ổn, phù hợp mua cho bé chơi giải trí.',
        'Thiết kế ngộ nghĩnh, màu sắc tươi sáng, rất hợp với trẻ em.',
        'Không dùng pin nên tiết kiệm và an toàn hơn cho bé.',
        'Con mình chơi được vài ngày rồi mà dây cót vẫn chạy bình thường.',
        'Mua làm quà sinh nhật cho cháu, cháu chơi rất vui.',
        'Bé vừa chơi vừa cười, nhìn rất dễ thương.',
    
        // Dài hơn
        'Đồ chơi tuy nhỏ nhưng thiết kế rất đáng yêu. Bé nhà mình rất thích những món đồ chơi có thể tự chạy như thế này.',
        'Mình mua cho con 3 tuổi, bé vặn cót tự chơi được nên không cần người lớn hỗ trợ nhiều.',
        'Chất liệu nhựa khá ổn, không có mùi nặng. Bé chơi cũng yên tâm hơn.',
        'Mua về cho bé chơi ở nhà, thấy bé chơi nhiều hơn mấy đồ chơi khác.',
        'Thiết kế đơn giản nhưng tạo được sự thích thú cho trẻ nhỏ.',
        'Bé chơi hoài không chán, mỗi lần vặn cót là cười rất vui.',
        'Đồ chơi nhỏ gọn nên dễ cất và mang theo khi đi chơi.',
        'So với giá tiền thì mình thấy sản phẩm này khá ổn.',
        'Bé nhà mình rất thích nhân vật này nên chơi suốt.',
        'Đồ chơi phù hợp để mua cho bé chơi hoặc làm quà.'
    ];

    protected static $nameBoyStudentRandom = [

		/* ===== TÊN 1 CHỮ (truyền thống – phổ biến) ===== */
		'An','Anh','Ân','Bách','Bảo','Bình','Cường','Chí','Dũng','Đạt',
		'Đức','Duy','Giang','Hải','Hiếu','Hoàng','Hùng','Huy','Khang',
		'Khánh','Kiên','Lâm','Long','Mạnh','Minh','Nam','Nghĩa','Nhân',
		'Phát','Phong','Phúc','Quân','Quang','Sơn','Tài','Thái','Thắng',
		'Thanh','Thiện','Thịnh','Thông','Toàn','Trí','Trung','Tuấn',
		'Tùng','Việt','Vinh','Vũ','Xuân',
	
		/* ===== TÊN 2 CHỮ (rất phổ biến hiện nay) ===== */
		'Anh Dũng','Anh Khoa','Anh Minh','Anh Tuấn',
		'Bảo Anh','Bảo Châu','Bảo Khang','Bảo Long','Bảo Minh','Bảo Nam',
		'Chí Công','Chí Dũng','Chí Kiên','Chí Thành',
		'Đăng Khoa','Đình Phong','Đình Quân','Đức Anh','Đức Huy',
		'Đức Long','Đức Minh','Đức Phát','Đức Thịnh','Đức Toàn',
		'Gia Bảo','Gia Huy','Gia Khang','Gia Khánh','Gia Long',
		'Gia Minh','Gia Phúc','Gia Thành',
		'Hải Anh','Hải Đăng','Hải Nam','Hải Phong',
		'Hoàng Anh','Hoàng Long','Hoàng Minh','Hoàng Phúc','Hoàng Sơn',
		'Hùng Cường','Hùng Dũng',
		'Khánh An','Khánh Duy','Khánh Hưng','Khánh Long',
		'Kim Long','Kim Phát',
		'Lâm Anh','Minh Anh','Minh Châu','Minh Đức','Minh Hải',
		'Minh Hiếu','Minh Hoàng','Minh Khang','Minh Long',
		'Minh Phát','Minh Quân','Minh Tài','Minh Thành','Minh Trí',
		'Ngọc Anh','Ngọc Hải','Ngọc Minh',
		'Phúc An','Phúc Khang','Phúc Long','Phúc Thịnh',
		'Quang Anh','Quang Hải','Quang Huy','Quang Minh',
		'Quang Phúc','Quang Thành',
		'Thanh Bình','Thanh Hải','Thanh Phong','Thanh Sơn',
		'Thiên Ân','Thiên Phúc','Thiên Tài',
		'Thành Công','Trung Hiếu','Trung Kiên','Trung Nghĩa',
		'Tuấn Anh','Tuấn Kiệt','Tuấn Minh','Tuấn Phong',
		'Văn Anh','Văn Dũng','Văn Hùng','Văn Minh',
		'Việt Anh','Việt Dũng','Việt Hoàng','Việt Long','Việt Phúc',
	
		/* ===== TÊN 3 CHỮ (hiện đại – học sinh mới) ===== */
		'Bảo Minh Anh','Bảo Long Anh','Gia Huy Anh','Gia Minh Anh',
		'Hoàng Minh Đức','Hoàng Phúc An','Khánh An Duy',
		'Minh Anh Tuấn','Minh Đức Thành','Minh Quân Anh',
		'Ngọc Minh Anh','Phúc An Khang','Quang Minh Đức',
		'Thanh Bình An','Thiên Phúc An','Trung Hiếu Anh',
	
		/* ===== TÊN HIỆN ĐẠI / DỄ THƯƠNG ===== */
		'Bin','Bo','Bon','Bum','Bắp','Cà','Cún','Đậu','Gấu',
		'Ken','Koi','Leo','Mon','Sóc','Tin','Tôm','Tom','Zin'
	];
	
	protected static $nameGirlStudentRandom = [

		/* ===== TÊN 1 CHỮ (truyền thống – phổ biến) ===== */
		'An','Anh','Ánh','Ân','Băng','Bảo','Bích','Châu','Chi','Diệp','Diễm',
		'Dung','Duyên','Giang','Hà','Hạnh','Hiền','Hoa','Hương','Huyền',
		'Khánh','Lan','Lệ','Liên','Linh','Loan','Ly','Mai','My','Nga',
		'Ngân','Ngọc','Nhi','Như','Oanh','Phương','Quỳnh','Thảo','Thanh',
		'Thúy','Trang','Trâm','Uyên','Vân','Vi','Vy','Yến','Ý','Tâm','Tuyết',
	
		/* ===== TÊN 2 CHỮ (rất phổ biến hiện nay) ===== */
		'Bảo Anh','Bảo Châu','Bảo Linh','Bảo Ngọc','Bảo Nhi','Bảo Trân',
		'Diệu Anh','Gia An','Gia Hân','Gia Linh','Gia My','Gia Nhi',
		'Gia Ngọc','Gia Phương','Hải Anh','Hoài An','Hoài Linh',
		'Khánh An','Khánh Chi','Khánh Linh','Khánh Vy',
		'Kim Anh','Kim Ngân','Kim Oanh','Kim Tuyến',
		'Mai Anh','Minh Anh','Minh Châu','Minh Hằng','Minh Khánh',
		'Minh Ngọc','Minh Tâm','Minh Thư',
		'Ngọc Anh','Ngọc Ánh','Ngọc Bích','Ngọc Châu','Ngọc Diệp',
		'Ngọc Hà','Ngọc Hân','Ngọc Lan','Ngọc Linh','Ngọc Mai',
		'Ngọc Nhi','Ngọc Phương','Ngọc Trâm','Ngọc Trang','Ngọc Vy',
		'Phương Anh','Phương Linh','Phương Mai','Phương Nhi',
		'Quỳnh Anh','Quỳnh Chi','Quỳnh Nga',
		'Thanh An','Thanh Hà','Thanh Huyền','Thanh Mai','Thanh Trúc',
		'Thảo Linh','Thảo My','Thảo Nguyên',
		'Thu Anh','Thu Hà','Thu Hương','Thu Linh','Thu Trang',
		'Thùy Anh','Thùy Chi','Thùy Dương','Thùy Linh',
		'Tú Anh','Tuyết Anh','Tuyết Mai',
		'Vân Anh','Vân Khánh','Vân Trang',
		'Yến Linh','Yến Nhi',
	
		/* ===== TÊN 3 CHỮ (hiện đại – học sinh mới) ===== */
		'An Nhiên','Bảo Khánh Linh','Bảo Ngọc Anh','Bảo Trân Anh',
		'Gia Hân Anh','Gia Linh Anh','Gia Ngọc Anh',
		'Hoài An Nhi','Khánh An Nhi','Kim Ngọc Anh',
		'Minh Anh Thư','Minh Ngọc Linh','Minh Tâm An',
		'Ngọc Anh Thư','Ngọc Hân Nhi','Ngọc Linh Chi',
		'Phương Anh Thư','Thanh An Nhi','Thảo Nguyên Anh',
		'Thùy Dương Anh','Vân Anh Thư',
	
		/* ===== TÊN DỄ THƯƠNG – HIỆN ĐẠI ===== */
		'Ami','Annie','Bella','Bon','Bunny','Cherry','Daisy',
		'Gạo','Kem','Mây','Mimi','Moon','Na','Nana','Sunny','Su','Xíu','Yu','Zoey'
	];

	protected static $firstNameVietnamese = [

		/* ===== RẤT PHỔ BIẾN (chiếm đa số dân số) ===== */
		'Nguyễn',
		'Trần',
		'Lê',
		'Phạm',
		'Hoàng', 'Huỳnh',
		'Phan',
		'Vũ', 'Võ',
		'Đặng',
		'Bùi',
		'Đỗ',
		'Hồ',
		'Ngô',
		'Dương',
		'Lý',
	
		/* ===== PHỔ BIẾN ===== */
		'Đinh',
		'Trịnh',
		'Mai',
		'Tạ',
		'Tôn',
		'Cao',
		'Lưu',
		'Vương',
		'Triệu',
		'Chu',
		'Thái',
		'Quách',
		'Tăng',
		'Hứa',
		'Tiêu',
		'Kim',
	
		/* ===== ÍT HƠN NHƯNG VẪN GẶP ===== */
		'Doãn',
		'Khổng',
		'Nghiêm',
		'Ôn',
		'Phùng',
		'Tống',
	];

	public static function generateName($gender, $firstName = null) {
		// trả về 1 mảnng firtname và lastname
		$name = [];
		if ($gender == 0) {
			$name['lastname'] = self::$nameBoyStudentRandom[array_rand(self::$nameBoyStudentRandom)];
		} else {
			$name['lastname'] = self::$nameGirlStudentRandom[array_rand(self::$nameGirlStudentRandom)];
		}
		// nếu lastname 1 từ thì nam thêm 'Văn' và nữ thêm 'Thị' vào sau firstname
		$name['firstname'] = $firstName ? $firstName : self::$firstNameVietnamese[array_rand(self::$firstNameVietnamese)];
		if (count(explode(' ', $name['lastname'])) == 1) {
			if ($gender == 0) {
				$name['firstname'] .= ' Văn';
			} else {
				$name['firstname'] .= ' Thị';
			}
		}
		return $name;
	}
    

	public function fakeReviews(int $count = 3): array
	{
		$pool = $this->sampleReviews;
		if (count($pool) < $count) {
			$pool = array_merge($pool, $pool);
		}
		shuffle($pool);
		$selected = array_slice($pool, 0, max(1, $count));

		$reviews = [];
		foreach ($selected as $content) {
			$gender = rand(0, 1);
			$nameArr = self::generateName($gender);
			$fullName = trim(($nameArr['firstname'] ?? '') . ' ' . ($nameArr['lastname'] ?? ''));
			$stars = rand(4, 5);
			$daysAgo = rand(1, 30);
			$time = now()->subDays($daysAgo);
			$reviews[] = [
				'name' => $fullName ?: 'Khách hàng',
				'content' => $content,
				'stars' => $stars,
				'time' => $time,
				'time_human' => $time->diffForHumans(),
			];
		}

		return $reviews;
	}

	public function fakeTotalReviews(): int
	{
		return rand(25, 180);
	}

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleteThumbnailFile(): void
    {
        if ($this->thumbnail_path) {
            Storage::disk('public')->delete($this->thumbnail_path);
        }
    }
}
