import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'package:url_launcher/url_launcher.dart';

class ChildDetailsScreen extends StatefulWidget {
  final String qrCode;
  const ChildDetailsScreen({super.key, required this.qrCode});

  @override
  State<ChildDetailsScreen> createState() => _ChildDetailsScreenState();
}

class _ChildDetailsScreenState extends State<ChildDetailsScreen> {
  Map<String, dynamic>? childData;
  bool loading = true;

  @override
  void initState() {
    super.initState();
    fetchChild();
  }

  Future<void> fetchChild() async {
    try {
      final response = await http.get(
        Uri.parse('http://10.0.2.2:8000/api/child/${widget.qrCode}'), // ou ton URL réelle
      );
      if (response.statusCode == 200) {
        setState(() {
          childData = jsonDecode(response.body);
          loading = false;
        });
      }
    } catch (e) {
      setState(() => loading = false);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Détails enfant')),
      body: loading
          ? const Center(child: CircularProgressIndicator())
          : childData == null
              ? const Center(child: Text('Enfant non trouvé'))
              : Padding(
                  padding: const EdgeInsets.all(16),
                  child: Column(
                    children: [
                      Text('Nom : ${childData!['name']}', style: const TextStyle(fontSize: 24)),
                      Text('QR : ${childData!['qr_code']}'),
                      Text('Né(e) le : ${childData!['birth_date']}'),
                      Text('Langue : ${childData!['language']}'),
                      const SizedBox(height: 20),
                      ElevatedButton(
                        onPressed: () {
                          // Ouvre le PDF bracelet
                          launchUrl(Uri.parse('http://10.0.2.2:8000/pdf/${widget.qrCode}'));
                        },
                        child: const Text('Télécharger le bracelet PDF'),
                      ),
                    ],
                  ),
                ),
    );
  }
}