import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';  
import 'screens/home_screen.dart';

void main() {
  runApp(const ProviderScope(child: LomoHealthApp()));
}

class LomoHealthApp extends StatelessWidget {
  const LomoHealthApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'LomoHealth Togo',
      theme: ThemeData(
        primarySwatch: Colors.green,
        fontFamily: 'Roboto',
      ),
      home: const HomeScreen(),
      debugShowCheckedModeBanner: false,
    );
  }
}