import 'package:flutter/material.dart';
import 'package:lomohealth_mobile/screens/child_details_screen.dart';
import 'package:mobile_scanner/mobile_scanner.dart';

class ScannerScreen extends StatelessWidget {
  const ScannerScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Scanner le QR')),
      body: MobileScanner(
        onDetect: (capture) {
          final List<Barcode> barcodes = capture.barcodes;
          for (final barcode in barcodes) {
            final String? code = barcode.rawValue;
            if (code != null) {
              Navigator.push(context, MaterialPageRoute(builder: (_) => ChildDetailsScreen(qrCode: code)));
              break;
            }
          }
        },
      ),
    );
  }
}