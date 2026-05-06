<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use App\Models\GallerySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriAdminController extends Controller
{
    public function index()
    {
        $section = GallerySection::first();

        if (!$section) {
            $section = GallerySection::create([
                'hero_title' => 'Galeri Pantai Pelawan',
                'hero_description' => 'Dokumentasi keindahan Pantai Pelawan dari berbagai sudut, suasana, dan momen wisata.',
                'hero_image' => 'images/hero-pantai.jpg',
                'section_label' => 'Dokumentasi Wisata',
                'section_title' => 'Foto Wisata Pantai Pelawan',
                'section_description' => 'Beberapa dokumentasi pemandangan dan suasana wisata Pantai Pelawan.',
                'cta_badge' => '📸 Dokumentasi Wisata',
                'cta_title' => 'Keindahan yang Tak Terlupakan',
                'cta_description' => 'Pantai Pelawan menawarkan pemandangan alam yang memukau dan cocok untuk diabadikan dalam berbagai momen wisata.',
            ]);
        }

        $items = GalleryItem::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.galeri.index', compact('section', 'items'));
    }

    public function updateHero(Request $request)
    {
        $section = GallerySection::firstOrCreate([]);

        $data = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('hero_image')) {
            if (
                $section->hero_image &&
                !str_starts_with($section->hero_image, 'images/') &&
                Storage::disk('public')->exists($section->hero_image)
            ) {
                Storage::disk('public')->delete($section->hero_image);
            }

            $data['hero_image'] = $request->file('hero_image')->store('galeri', 'public');
        }

        $section->update($data);

        return back()->with('success', 'Hero galeri berhasil diperbarui.');
    }

    public function updateHeading(Request $request)
    {
        $section = GallerySection::firstOrCreate([]);

        $data = $request->validate([
            'section_label' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'section_description' => 'nullable|string',
        ]);

        $section->update($data);

        return back()->with('success', 'Judul section galeri berhasil diperbarui.');
    }

    public function updateCta(Request $request)
    {
        $section = GallerySection::firstOrCreate([]);

        $data = $request->validate([
            'cta_badge' => 'required|string|max:255',
            'cta_title' => 'required|string|max:255',
            'cta_description' => 'nullable|string',
        ]);

        $section->update($data);

        return back()->with('success', 'CTA galeri berhasil diperbarui.');
    }

    public function storeItem(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'type' => 'required|in:normal,large,wide',
            'sort_order' => 'nullable|integer',
        ]);

        $data['image'] = $request->file('image')->store('galeri', 'public');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        GalleryItem::create($data);

        return back()->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function updateItem(Request $request, GalleryItem $item)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'type' => 'required|in:normal,large,wide',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }

            $data['image'] = $request->file('image')->store('galeri', 'public');
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;

        $item->update($data);

        return back()->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroyItem(GalleryItem $item)
    {
        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }
}