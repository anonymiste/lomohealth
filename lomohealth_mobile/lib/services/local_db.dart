import 'package:sqflite/sqflite.dart';
import 'package:path/path.dart';

class LocalDB {
  static Database? _db;

  static Future<Database> get db async {
    _db ??= await _init();
    return _db!;
  }

  static Future<Database> _init() async {
    final path = join(await getDatabasesPath(), 'lomohealth.db');
    return await openDatabase(path, version: 1, onCreate: (db, version) {
      db.execute('CREATE TABLE children (...)'); // toute la structure
    });
  }

  // sync quand réseau revient
  static Future<void> syncWhenOnline() async { /* TODO */ }
}