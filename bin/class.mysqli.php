<?php
	/**
	 * class mysqli สำหรับ GCMS
	 * สงวนลิขสิทธ์ ห้ามซื้อขาย ให้นำไปใช้ได้ฟรีเท่านั้น
	 * @package class.mysqli.php
	 * @author กรกฎ วิริยะ (http://www.goragod.com)
	 */
	class sql {
		protected $vesion = "3-10-56";
		protected $time = 0;
		/**
		 * MySQLi instance
		 *
		 * @var mysqli
		 */
		protected $connection = false;
		/**
		 * set debug (1 = debug ใช้งานขณะ ทดสอบเท่านั้น, 0 = no debug)
		 *
		 * @var string
		 */
		var $debug = 0;
		/**
		 * __construct($server, $username, $password, $dbname, $new = true)
		 * inintial database class
		 * สำเร็จคืนค่า true
		 * ไม่สำเร็จคืนค่า false
		 *
		 * @param string $server Database server
		 * @param string $username Database username
		 * @param string $password Database password
		 * @param string $dbname Database name
		 * @param int [optional] $port Database port
		 *
		 * @return boolean
		 */
		public function __construct($server, $username, $password, $dbname, $port = NULL) {
			if ($port == NULL) {
				$port = ini_get('mysqli.default_port');
			}
			$this->connection = new mysqli($server, $username, $password, $dbname, $port);
			if ($this->connection->connect_error) {
				$this->debug('Connect Error');
				return false;
			} else {
				$this->connection->set_charset('utf8');
				return true;
			}
		}
		/**
		 * __destruct()
		 * จบ class
		 * สำเร็จคืนค่า true
		 * ไม่สำเร็จคืนค่า false
		 *
		 * @return int
		 */
		public function __destruct() {
			return $this->connection->close();
		}
		/**
		 * connection()
		 * อ่านค่า resource connection
		 *
		 * @return int
		 */
		public function connection() {
			return $this->connection;
		}
		/**
		 * close()
		 * ยกเลิก mysql
		 * สำเร็จคืนค่า true
		 * ไม่สำเร็จคืนค่า false
		 *
		 * @return boolean
		 */
		public function close() {
			return $this->connection->close();
		}
		/**
		 * Error()
		 * อ่าน error ของ mysql
		 *
		 * @return string
		 */
		public function Error() {
			return $this->connection->connect_error ? $this->connection->connect_error : $this->connection->error;
		}
		/**
		 * Version()
		 * อ่านเวอร์ชั่นของ class
		 *
		 * @return string
		 */
		public function Version() {
			return $this->vesion;
		}
		/**
		 * tableExists($table)
		 * ตรวจสอบว่ามีตาราง $table อยู่หรือไม่
		 * คืนค่า true ถ้ามี
		 * ไม่มีคืนค่า false
		 *
		 * @return boolean
		 */
		public function tableExists($table) {
			$result = @mysql_query("SELECT 1 FROM `$table`", $this->dbconnection);
			$_SESSION[$this->time]++;
			if (!$result) {
				return false;
			} else {
				return true;
			}
		}
		/**
		 * fieldexists($table, $field)
		 * ตรวจสอบฟิลด์ในตาราง
		 * คืนค่า true หากมีฟิลด์นี้อยู่
		 * ไม่พบคืนค่า false
		 *
		 * @return boolean
		 */
		public function fieldexists($table, $field) {
			$sql = "SHOW COLUMNS FROM `$table`";
			$result = $this->connection->query($sql);
			if (!$result) {
				$this->debug($sql);
			} elseif ($result->num_rows > 0) {
				$_SESSION[$this->time]++;
				$field = strtolower($field);
				while ($row = $result->fetch_assoc()) {
					if (strtolower($row['Field']) == $field) {
						return true;
					}
				}
			}
			return false;
		}
		/**
		 * basicSearch($table, $fields, $values)
		 * ค้นหา $values ที่ $fields บนตาราง $table
		 * ไม่พบคืนค่า false
		 * พบคืนค่ารายการที่พบเพียงรายการเดียว
		 *
		 * @param string $table ชื่อตาราง
		 * @param array or string $fields ชื่อฟิลด์
		 * @param array or string $values ข้อความค้นหาในฟิลด์ที่กำหนด ประเภทเดียวกันกับ $fields
		 *
		 * @return array
		 * @return boolean
		 */
		public function basicSearch($table, $fields, $values) {
			if (is_array($fields)) {
				foreach ($fields AS $i => $field) {
					if (is_array($values)) {
						$search[] = "`$field`='$values[$i]'";
					} else {
						$search[] = "`$field`='$values'";
					}
				}
			} else {
				if (is_array($values)) {
					$search[] = "`$fields` IN ('".implode("','", $values)."')";
				} else {
					$search[] = "`$fields`='$values'";
				}
			}
			$sql = "SELECT * FROM `$table` WHERE ".implode(' OR ', $search)." LIMIT 1;";
			$result = $this->connection->query($sql);
			if (!$result) {
				$this->debug($sql);
				return false;
			} else {
				$_SESSION[$this->time]++;
				if ($this->connection->num_rows == 0) {
					return false;
				} else {
					$row = $result->fetch_assoc();
					$result->free();
					return $row;
				}
			}
		}
		/**
		 * getRec($table, $id)
		 * อ่านค่า record ที่ id=$id
		 * ไม่พบคืนค่า false
		 * พบคืนค่ารายการที่พบเพียงรายการเดียว
		 *
		 * @param string $table ชื่อตาราง
		 * @param int $id id ที่ต้องการอ่าน
		 *
		 * @return array
		 * @return boolean
		 */
		public function getRec($table, $id) {
			$sql = "SELECT * FROM `$table` WHERE `id`=".(int)$id." LIMIT 1";
			$result = $this->connection->query($sql);
			if (!$result) {
				$this->debug($sql);
				return false;
			} else {
				$_SESSION[$this->time]++;
				if ($result->num_rows == 0) {
					return false;
				} else {
					$row = $result->fetch_assoc();
					$result->free();
					return $row;
				}
			}
		}
		/**
		 * add($table, $recArr)
		 * เพิ่มข้อมูลลงบน $table
		 * สำเร็จ คืนค่า id ที่เพิ่ม
		 * ไม่สำเร็จ คืนค่า false
		 *
		 * @param string $table ชื่อตาราง
		 * @param array $recArr ข้อมูลที่ต้องการบันทึก
		 *
		 * @return int
		 * @return boolean
		 */
		public function add($table, $recArr) {
			$keys = array();
			$values = array();
			foreach ($recArr AS $key => $value) {
				$keys[] = $key;
				$values[] = $value;
			}
			$sql = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys);
			$sql .= "`) VALUES ('".implode("','", $values);
			$sql .= "');";
			$result = $this->connection->query($sql);
			if (!$result) {
				$this->debug($sql);
				return false;
			} else {
				$_SESSION[$this->time]++;
				return $this->connection->insert_id;
			}
		}
		/**
		 * edit($table, $id, $recArr)
		 * แก้ไขข้อมูล
		 *
		 * @param $table string ชื่อตาราง
		 * @param $idArr int=id ที่ต้องการแก้ไข, array=ค้นหารายการที่ต้องการ
		 * @param $recArr array ข้อมูลที่ต้องการบันทึก
		 *
		 * @return boolean true success else false
		 */
		public function edit($table, $idArr, $recArr) {
			if (is_array($idArr)) {
				$datas = array();
				foreach ($idArr AS $key => $value) {
					$datas[] = "`$key`='$value'";
				}
				$id = implode(' AND ', $datas);
			} else {
				$id = (int)$idArr;
				$id = $id == 0 ? '' : "`id`='$id'";
			}
			if ($id == '') {
				return false;
			} else {
				$datas = array();
				foreach ($recArr AS $key => $value) {
					$datas[] = "`$key`='$value'";
				}
				$sql = "UPDATE `$table` SET ".implode(",", $datas)." WHERE $id LIMIT 1";
				$result = $this->connection->query($sql);
				if (!$result) {
					$this->debug($sql);
					return false;
				} else {
					$_SESSION[$this->time]++;
					return true;
				}
			}
		}
		/**
		 * delete($table, $id)
		 * ลบ เร็คคอร์ดรายการที่ $id
		 * สำเร็จ คืนค่าว่าง
		 * ไม่สำเร็จคืนค่าข้อความผิดพลาด
		 *
		 * @param string $table ชื่อตาราง
		 * @param int $id id ที่ต้องการลบ
		 *
		 * @return string
		 */
		public function delete($table, $id) {
			$sql = "DELETE FROM `$table` WHERE `id`=".(int)$id." LIMIT 1;";
			$result = $this->connection->query($sql);
			$_SESSION[$this->time]++;
			return !$result ? $this->connection->error : '';
		}
		/**
		 * query($sql)
		 * query ข้อมูล แบบไม่ต้องการผลตอบกลับ
		 * สำเร็จ คืนค่า true
		 * ไม่สำเร็จ คืนค่า false
		 *
		 * @param string $sql query string
		 *
		 * @return boolean
		 */
		public function query($sql) {
			$result = $this->connection->query($sql);
			if (!$result) {
				$this->debug($sql);
				return false;
			} else {
				$_SESSION[$this->time]++;
				return true;
			}
		}
		/**
		 * customQuery($sql)
		 * query ข้อมูล ด้วย sql ที่กำหนดเอง
		 * คืนค่าผลการทำงานเป็น record ของข้อมูลทั้งหมดที่ตรงตามเงื่อนไข
		 * ไม่พบข้อมูลคืนค่าเป็น array ว่างๆ
		 *
		 * @param string $sql query string
		 *
		 * @return array
		 */
		public function customQuery($sql) {
			$recArr = array();
			$result = $this->connection->query($sql);
			if (!$result) {
				$this->debug($sql);
			} else {
				$_SESSION[$this->time]++;
				while ($row = $result->fetch_assoc()) {
					$recArr[] = $row;
				}
				$result->free();
			}
			return $recArr;
		}
		/**
		 * lastId($table)
		 * อ่าน id ล่าสุดของตาราง
		 *
		 * @param string $table ชื่อตาราง
		 *
		 * @return int
		 */
		function lastId($table) {
			$result = $this->connection->query("SHOW TABLE STATUS LIKE '$table'");
			if (!$result) {
				$this->debug('lastId');
				return false;
			} else {
				$row = $result->fetch_assoc();
				$_SESSION[$this->time]++;
				return (int)$row['Auto_increment'];
			}
		}
		/**
		 * unlock()
		 * ยกเลิกการล๊อคตารางทั้งหมดที่ล๊อคอยู่
		 * สำเร็จ คืนค่า true
		 * ไม่สำเร็จ คืนค่า false
		 *
		 * @return boolean
		 */
		function unlock() {
			return $this->query('UNLOCK TABLES');
		}
		/**
		 * lock($table)
		 * ล๊อคตาราง
		 * สำเร็จ คืนค่า true
		 * ไม่สำเร็จ คืนค่า false
		 *
		 * @param string $table ชื่อตาราง
		 *
		 * @return boolean
		 */
		function lock($table) {
			return $this->query("LOCK TABLES $table");
		}
		/**
		 * setReadLock($table)
		 * ล๊อคตารางสำหรับอ่าน
		 * สำเร็จ คืนค่า true
		 * ไม่สำเร็จ คืนค่า false
		 *
		 * @param string $table ชื่อตาราง
		 *
		 * @return boolean
		 */
		function setReadLock($table) {
			return $this->lock("`$table` READ");
		}
		/**
		 * setWriteLock($table)
		 * ล๊อคตารางสำหรับเขียน
		 * สำเร็จ คืนค่า true
		 * ไม่สำเร็จ คืนค่า false
		 *
		 * @param string $table ชื่อตาราง
		 *
		 * @return boolean
		 */
		function setWriteLock($table) {
			return $this->lock("`$table` WRITE");
		}
		/**
		 * sql_clean($value)
		 * ตรวจสอบและลบข้อความที่ไม่ต้องการของ mysql
		 *
		 * @param string $value ข้อความ
		 *
		 * @return string
		 */
		public function sql_clean($value) {
			if ((function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) || ini_get('magic_quotes_sybase')) {
				$value = stripslashes($value);
			}
			return $this->connection->real_escape_string($value);
		}
		/**
		 * sql_quote($value)
		 * เติม string ด้วย /
		 *
		 * @param string $value ข้อความ
		 *
		 * @return string
		 */
		public function sql_quote($value) {
			return str_replace('\\\\', '&#92;', $this->sql_clean($value));
		}
		/**
		 * sql_trim($value)
		 * ลบช่องว่างหัวท้ายออกจากข้อความ และ เติม string ด้วย /
		 *
		 * @param string $value ข้อความ
		 *
		 * @return string
		 */
		public function sql_trim($value) {
			return $this->sql_quote(trim($value));
		}
		/**
		 * sql_trim_str($value)
		 * ลบช่องว่างหัวท้ายออกจากข้อความ และ เติม string ด้วย / และ แปลงอักขระ HTML
		 *
		 * @param string $value ข้อความ
		 *
		 * @return string
		 */
		public function sql_trim_str($value) {
			return $this->sql_quote(htmlspecialchars(trim($value)));
		}
		/**
		 * sql_str($value)
		 * เติม string ด้วย / และ แปลงอักขระ HTML
		 *
		 * @param string $value ข้อความ
		 *
		 * @return string
		 */
		public function sql_str($value) {
			return $this->sql_quote(htmlspecialchars($value));
		}
		/**
		 * sql_mktimetodate($mktime)
		 * แปลงวันที่ ในรูป mktime เป้นวันที่ของ mysql ในรูป Y-m-d
		 *
		 * @param int $mktime วันที่ในรูป mktime
		 *
		 * @return string
		 */
		public function sql_mktimetodate($mktime) {
			return date("Y-m-d", $mktime);
		}
		/**
		 * sql_mktimetodatetime($mktime)
		 * แปลงวันที่ ในรูป mktime เป้นวันที่และเวลาของ mysql เช่น Y-m-d H:i:s
		 *
		 * @param int $mktime วันที่ในรูป mktime
		 *
		 * @return string
		 */
		public function sql_mktimetodatetime($mktime) {
			return date("Y-m-d H:i:s", $mktime);
		}
		/**
		 * sql_date2date($date, $short = true)
		 * แปลงวันที่ในรูป Y-m-d เป็นวันที่แบบสั้นและเวลา เช่น 1 มค. 2555 12:00:00
		 * @param string $date วันที่ในรูป Y-m-d h:i:s
		 * @param boolean $short true (default) เดือนแบบสั้น, false เดือนแบบยาว
		 * @param boolean $time true (default) คืนค่า เวลาด้วย (ถ้ามี)
		 *
		 * @return string
		 */
		public function sql_date2date($date, $short = true, $time = true) {
			global $lng;
			preg_match('/([0-9]+){0,4}-([0-9]+){0,2}-([0-9]+){0,2}(\s([0-9]+){0,2}:([0-9]+){0,2}:([0-9]+){0,2})?/', $date, $match);
			if ((int)$match[1] == 0) {
				return '';
			} else {
				$month = $short ? $lng['MONTH_SHORT'] : $lng['MONTH_LONG'];
				return $match[3].' '.$month[(int)$match[2] - 1].' '.((int)$match[1] + $lng['YEAR_OFFSET']).($time ? $match[4] : '');
			}
		}
		/**
		 * sql_datetime2mktime($date)
		 * แปลงวันที่และเวลาของ sql เป็น mktime
		 * คืนค่าเวลาในรูป mktime
		 *
		 * @param string $date วันที่ในรูป Y-m-d H:i:s
		 *
		 * @return int
		 */
		function sql_datetime2mktime($date) {
			preg_match('/([0-9]+){0,4}-([0-9]+){0,2}-([0-9]+){0,2}\s([0-9]+){0,2}:([0-9]+){0,2}:([0-9]+){0,2}/', $date, $match);
			return mktime($match[4], $match[5], $match[6], $match[2], $match[3], $match[1]);
		}
		/**
		 * timer_start()
		 * เริ่มต้นจับเวลาการประมวลผล
		 *
		 * @return boolean
		 */
		public function timer_start() {
			$mtime = microtime();
			$mtime = explode(' ', $mtime);
			$this->time_start = $mtime[1] + $mtime[0];
			$_SESSION[$this->time] = 0;
			return true;
		}
		/**
		 * timer_stop()
		 * จบการจับเวลา
		 * คืนค่าเวลาที่ใช้ไป (msec)
		 *
		 * @return int
		 */
		public function timer_stop() {
			$mtime = microtime();
			$mtime = explode(' ', $mtime);
			$time_end = $mtime[1] + $mtime[0];
			$time_total = $time_end - $this->time_start;
			return round($time_total, 10);
		}
		/**
		 * query_count()
		 * จำนวน query ทั้งหมดที่ทำงาน
		 *
		 * @return int
		 */
		public function query_count() {
			$t = $_SESSION[$this->time];
			unset($_SESSION[$this->time]);
			return (int)$t;
		}
		/**
		 * debug($text)
		 * @param string $sql ข้อความที่จะแสดง (error)
		 */
		private function debug($text) {
			if ($this->debug == 1) {
				echo preg_replace(array('/\r/', '/\n/', '/\t/'), array('', ' ', ' '), "Error : $text \nMessage : ".$this->Error());
			}
		}
	}
